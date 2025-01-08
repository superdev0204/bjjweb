<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Gyms;

class UploadAcademyCommand extends Command
{
    protected $signature = 'custom:upload-academy {--source= : source} {--filename= : filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update gyms from CSV file';

    /** csv data file delimiter */
    const DATA_FILE_DELIMITER = "\t";
    
    const DATA_DIR = 'datafiles/academies';
    
    /** field mapping */
    protected $map = [
        'name'  => 1,
        'city'  => 6,
        'state' => 7,
        'country'  => 9,
        'website'  => 10,
        'address'  => 5,
        'sourceId' => 0,
        'addressShort'  => 6,
        'federation'    => 3,
        'headProfessor' => 2
    ];
    
    public function handle()
    {
        $source   = $this->option('source');
        $fileName = base_path('/' . self::DATA_DIR . '/' . $this->option('filename') . '.csv');
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
        while (($data = fgetcsv($fileResource, 1024, self::DATA_FILE_DELIMITER)) !== FALSE) {
            if ($line++ === 0) {
                continue;
            }
            
            /**
             * - Look up academy based on source and source id
             * - If not exist, look up based on name and address
             * - If not exist, create new academy
             */
            $name = trim($data[$this->map['name']]);
            $city = trim($data[$this->map['city']]);
            $address = trim($data[$this->map['addressShort']]);
            
            $academy = $this->findAcademyBySource($source, $data[$this->map['sourceId']]);
            if ($academy === false) {
                $academy = $this->findAcademyByName(
                    $data[$this->map['name']],
                    $data[$this->map['address']],
                    $data[$this->map['city']]
                );
            }
            
            $federation   = $this->findFederation(trim($data[$this->map['federation']]));
            $importedData = [
                'name' => $name,
                'head_professor' => trim($data[$this->map['headProfessor']]),
                'federation_id'  => $federation->id,
                'address' => $address,
                'city'    => $city,
//                 'state'   => trim($data[$this->map['state']]),
                'website' => trim($data[$this->map['website']]),
                'country_id' => trim($data[$this->map['country']]),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            
            if ($academy === false) {
                // new academy
                $newData = [
                    'zip'   => '', // zip code cannot be null
                    'state' => '', // state cannot be null
                    'source'     => $source,
                    'source_id'  => trim($data[$this->map['sourceId']]),
                    'approved'   => 0, // need confirmation
                    'created_at' => date('Y-m-d H:i:s')
                ];
                DB::table('gyms')->insert((array) array_merge($newData, $importedData));
                $newDataCounter++;
            } else {
                $arrayData = (array) $academy;
                DB::table('gyms')->where('id', $academy->id)->update((array) array_merge($arrayData, $importedData));
//                 $output->writeln('<fg=green>Updated: ' . $academy->id . ' ' . $academy->name . '</>');
                $updateDataCounter++;
            }
        }

        DB::update('update states s set gym_count = (select count(*) from gyms g where s.state_code = g.state and g.approved > 0)');
        DB::update('update cities c set gym_count = (select count(*) from gyms g where c.state = g.state and c.city = g.city and g.approved > 0)');
        $this->info('<fg=blue>New Record: ' . $newDataCounter . '</>');
        $this->info('<fg=green>Updated Record: ' . $updateDataCounter . '</>');
        fclose($fileResource);
    }

    
    /*
     * Find Gym by source
     *
     * @param   string  $source
     * @param   string  $sourceId
     *
     * @return  \stdClass | boolean
     *
     */
    private function findAcademyBySource(string $source, string $sourceId)
    {
        $result = Gyms::where('source', '=', $source)
                    ->where('source_id', '=', $sourceId)
                    ->first();

        return $result;
    }
    
    /*
     * Find Gym by name & address 
     * 
     * @param   string  $name
     * @param   string  $address
     * @param   string  $city
     * 
     * @return  \stdClass | boolean
     * 
     */
    private function findAcademyByName(string $name, string $address, string $city)
    {
        $matchingAddr = str_replace(
            ['street', 'avenue', 'drive', 'road', '.'],
            ['st', 'ave', 'dr', 'rd', ''],
            strtolower($address)
        );

        $result = Gyms::where('name', '=', $name)
                    ->where(DB::raw("REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(LOWER(address), 'avenue', 'ave'), 'street', 'st'), 'drive', 'dr'), 'road', 'rd'), '.', '')"), 'like', '%' . $matchingAddr . '%')
                    ->where('city', '=', $city)
                    ->first();

        return $result;
    }
    
    /*
     * Find Federation By Id
     *
     * @param   string  $id
     *
     * @return  \stdClass | boolean
     *
     */
    private function findFederation(string $id)
    {
        $result = DB::table('federation')
                    ->where('id', '=', $id)
                    ->first();
                    
        return $result;
    }
}