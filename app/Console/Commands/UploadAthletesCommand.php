<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Gyms;
use App\Models\Athlete;

class UploadAthletesCommand extends Command
{
    protected $signature = 'custom:upload-athletes {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update gyms from CSV file';

    /** csv data file delimiter */
    const DATA_FILE_DELIMITER = "\t";
    
    const DATA_DIR = 'datafiles/athletes';
    
    /** field mapping */
    protected $map = [
        'name'  => 0,
        'belt'  => 1,
        'academy'    => 4,
        'federation' => 6
    ];

    public function handle()
    {
        $fileName = base_path('/' . self::DATA_DIR . '/' . $this->argument('filename') . '.csv');
        $file     = new \SplFileInfo($fileName);
        
        // check file extension
        if (strtolower($file->getExtension()) !== 'csv') {
            $this->info('<fg=red>Please use CSV file for uploading data</>');
            return;
        }
        
        // check if file can be opened
        if (($fileResource = @fopen($fileName, 'r')) === false) {
            $this->info('<fg=red>Unable to open data file</>');
            return;
        }

        $newDataCounter = $updateDataCounter = $line = 0;
        $cannotProcessData = [];
        $this->info('<fg=blue>Processing</>');
        while (($data = fgetcsv($fileResource, 1024, self::DATA_FILE_DELIMITER)) !== FALSE) {
            if ($line++ === 0) {
                continue;
            }
            
            $srcAcademy = trim($data[$this->map['academy']]);
            $srcName  = trim($data[$this->map['name']]);
            $srcBelt  = trim($data[$this->map['belt']]);
            $beltRank = $this->getBeltLike($srcBelt);

            // matching academy
            $matchAcademy = $this->matchByName($srcAcademy, 'academy');
            if (is_null($matchAcademy) || $matchAcademy === false) {
                $academy  = null;
            } else {
                $academy = Gyms::where("id", $matchAcademy->id)->first();
            }

            // matching athlete by name
            $matchAthlete = $this->matchByName($srcName, 'athlete');

            if ($beltRank !== null && $academy !== null) {
                if ($matchAthlete) {
                    $athlete = Athlete::where("uuid", $matchAthlete->uuid)->first();
                    $updateDataCounter++;
                } else {
                    $athlete = Athlete::create([
                        "uuid" => "",
                        "first_name" => "",
                        "created_at" => date('Y-m-d H:i:s')
                    ]);
                    $newDataCounter++;
                }
                
                // save athletes
                $athlete->first_name = $srcName;
                $athlete->current_belt = $beltRank;
                $athlete->gym_id = $academy->id;
                $athlete->save();
                $this->info('<fg=green>.</>');
            } else {
                // handling cannot process data
                $errorMessages = [];
                $errorMessages[] = '<fg=yellow>' . $srcName . '</>';
                if (is_null($academy)) {
                    $errorMessages[] = '<fg=magenta>' . $srcAcademy . '</> - <fg=red>Academy/Gym not found</>';
                }
                
                if (is_null($beltRank)) {
                    $errorMessages[] = '<fg=magenta>' . $srcBelt . '</> - <fg=red>Belt Rank not found</>';
                }
                
                $this->info('<fg=red>.</>');
                $cannotProcessData[] = $errorMessages;
            }
        }
        
        $this->info('');
        foreach ($cannotProcessData as $errorMessages) {
            $this->info(implode(',', $errorMessages));
        }
        
        $this->info('<fg=green>New Athlete(s): ' . $newDataCounter . '</>');
        $this->info('<fg=blue>Existing Athlete(s): ' . $updateDataCounter . '</>');
        $this->info('<fg=red>Cannot Process Athlete(s): ' . count($cannotProcessData) . '</>');
        
        fclose($fileResource);
    }

    /**
     * @return mixed
     */
    public function matchByName($name, $type)
    {
        $matchingName = str_replace(['.', '-'], ['', ' '], strtolower($name));

        if($type == "academy"){
            $result = DB::table('gyms')
                    ->whereRaw("REPLACE(REPLACE(LOWER(name), '.', ''), '-', ' ') LIKE ?", ['%' . $matchingName . '%'])
                    ->first();
        }
        else{
            $result = DB::table('athlete')
                        ->whereRaw("REPLACE(REPLACE(LOWER(TRIM(CONCAT(IFNULL(first_name, ''), IFNULL(last_name, '')))), '.', ''), '-', ' ') LIKE ?", ['%' . $matchingName . '%'])
                        ->first();
        }

        return $result;
    }
    
    /**
     * @return mixed
     */
    public function getBeltLike($rank)
    {
        $result = DB::table('belt_rank')
                    ->where('rank', 'LIKE', '%' . $rank . '%')
                    ->first();

        return $result;
    }
}
