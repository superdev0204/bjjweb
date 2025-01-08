<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\States;
use App\Models\Gyms;
use App\Models\Cities;

class GymsUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:gyms-update {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update gyms from CSV file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = base_path('datafiles/gyms/' . $this->argument('filename') . '.csv');

        if (!file_exists($filePath)) {
            $this->error('Unable to open the data file');
            return;
        }

        $file = fopen($filePath, 'r');

        // This loops through the lines
        $row = $existCount = $newCount = $newCityCounter = 0;
        $cityId = null;
        while (($data = fgetcsv($file, 8000, ";")) !== false) {        
            $row++;
    
            if ($row == 1) {
                $idColumnNumber = array_search('id', $data);
                continue;
            }

            $this->info("test {$row} = {$data[0]}");

            $gym = null;
            if (isset($idColumnNumber) && !empty($data[$idColumnNumber])) {
                $gym = Gyms::where('id', trim($data[$idColumnNumber]))->first();
            }
            
            $city = trim($data[4]);
            $name = htmlspecialchars(trim($data[0]));
            $address = strtolower(htmlspecialchars(trim($data[3])));
            if (!$gym) {
                $address = trim(str_replace(['street', 'avenue', 'drive', 'road', '.'], ['st', 'ave', 'dr', 'rd', ''], $address));
                $address = str_replace("'", "", $address);
                $gym = Gyms::where('name', $name)
                            ->where(DB::raw("LOWER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(address, 'avenue', 'ave'), 'street', 'st'), 'drive', 'dr'), 'road', 'rd'), '.', ''))"), 'LIKE', DB::raw("'%" . str_replace('.', '', strtolower(str_replace(['avenue', 'street', 'drive', 'road'], ['ave', 'st', 'dr', 'rd'], $address))) . "%'"))
                            ->where('city', $city)
                            ->first();
            }

            $state   = trim($data[5]);
            $cityObj = null;
            if (!$gym) {
                $newCount++;

                $countryId = trim($data[31]);

                $cityObj = Cities::where(DB::raw("LOWER(city)"), 'LIKE', DB::raw("'%" . strtolower($city) . "%'"))
                                ->where('country_id', $countryId)
                                ->first();

                if (!$cityObj) {
                    $push_data = [];
                    $push_data['city'] = $city;
                    if (!empty($state) && strlen($state) > 3) {
                        $push_data['state'] = null;
                    } else {
                        $push_data['state'] = $state;
                    }
                    $push_data['city'] = $city;
                    $push_data['country_id'] = $countryId;
                    $push_data['filename'] = $this->createFilename($city, $state, $countryId);
                    $push_data['created_at'] = date('Y-m-d H:i:s');

                    // $cityObj->statefile  = $basicCityEntity::createStatefile($state); // because in csv only state code

                    $new_city = Cities::create($push_data);
                    try {
                        $cityId = $new_city->id;
                        $newCityCounter++;
                        $this->info('New City ' . $newCityCounter . ': ' . $city);
                    } catch (\Exception $e) {
                        $cityId = null;
                    }                           
                } else {
                    $cityId = $cityObj->id;
                }

                $this->info('New Record ' . $newCount . ': ' . $data[0]);

                $push_data = [];
                $push_data['name'] = $name;
                $push_data['website'] = trim($data[1]);
                $push_data['phone'] = trim($data[2]);
                $push_data['address'] = $address;
                $push_data['city'] = trim($data[4]);
                $push_data['city_id'] = $cityId;
                $push_data['state'] = trim($data[5]);
                $push_data['zip'] = trim($data[6]);
                $push_data['stars'] = trim($data[7]);
                $push_data['country_id'] = trim($data[31]);
                $push_data['details'] = htmlspecialchars(trim($data[9]));
                $push_data['logo_url'] = trim($data[10]);
                $push_data['kids_program_url'] = trim($data[11]);
                $push_data['kids_program_detail'] = htmlspecialchars(trim($data[12]));
                $push_data['woman_only_program_url'] = trim($data[13]);
                $push_data['woman_only_program_detail'] = htmlspecialchars(trim($data[14]));
                $push_data['other_programs'] = htmlspecialchars(trim($data[15]));
                $push_data['pricing'] = htmlspecialchars(trim($data[16]));
                $push_data['schedule_url'] = trim($data[17]);
                $push_data['business_hour'] = trim($data[18]);
                $push_data['head_professor'] = htmlspecialchars(trim($data[19]));
                $push_data['special_offer'] = trim($data[20]);
                $push_data['email'] = trim($data[21]);
                $push_data['facebook_url'] = trim($data[22]);
                $push_data['youtube_channel'] = trim($data[23]);
                $push_data['video_url'] = trim($data[24]);
                $push_data['instagram_url'] = trim($data[25]);
                $push_data['awards'] = htmlspecialchars(trim($data[26]));
                $push_data['multiple_locations'] = $data[27] == 'YES' ? 1 : 0;
                $push_data['federation'] = trim($data[29]);
                $push_data['team'] = trim($data[30]);
                $push_data['updatedby'] = 10;
                if (isset($data[33]) && strtolower($data[33]) == "closed") {
                    $push_data['approved'] = -1;
                }
                else{
                    $push_data['approved'] = 1;
                }
                
                if ($data[32] <> "") {
                    $push_data['source'] = 'IBJJF';
                    $push_data['source_id'] = isset($data[32]) ? $data[32] : "";
                }

                $gym = Gyms::create($push_data);
            }
            else{
                $existCount++;
                $this->info('Existing ' . $existCount . ': ' . $data[0]);

                $gym->name = $name;
                $gym->website = trim($data[1]);
                $gym->phone = trim($data[2]);
                $gym->address = $address;
                $gym->city = trim($data[4]);
                $gym->city_id = $cityId;
                $gym->state = trim($data[5]);
                $gym->zip = trim($data[6]);
                $gym->stars = trim($data[7]);
                $gym->country_id = trim($data[31]);
                $gym->details = htmlspecialchars(trim($data[9]));
                $gym->logo_url = trim($data[10]);
                $gym->kids_program_url = trim($data[11]);
                $gym->kids_program_detail = htmlspecialchars(trim($data[12]));
                $gym->woman_only_program_url = trim($data[13]);
                $gym->woman_only_program_detail = htmlspecialchars(trim($data[14]));
                $gym->other_programs = htmlspecialchars(trim($data[15]));
                $gym->pricing = htmlspecialchars(trim($data[16]));
                $gym->schedule_url = trim($data[17]);
                $gym->business_hour = trim($data[18]);
                $gym->head_professor = htmlspecialchars(trim($data[19]));
                $gym->special_offer = trim($data[20]);
                $gym->email = trim($data[21]);
                $gym->facebook_url = trim($data[22]);
                $gym->youtube_channel = trim($data[23]);
                $gym->video_url = trim($data[24]);
                $gym->instagram_url = trim($data[25]);
                $gym->awards = htmlspecialchars(trim($data[26]));
                $gym->multiple_locations = $data[27] == 'YES' ? 1 : 0;
                $gym->federation = $data[29];
                $gym->team = $data[30];
                
                $gym->updatedby = 10;
                if (isset($data[33]) && strtolower($data[33]) == "closed") {
                    $gym->approved = -1;
                }
                else{
                    $gym->approved = 1;
                }

                if ($data[32] <> "") {
                    $gym->source='IBJJF';
                    $gym->source_id = isset($data[32]) ? $data[32] : "";
                }

                $gym->save();
            }
        }

        fclose($file);

        DB::statement('update states s set gym_count = (select count(*) from gyms g where s.state_code = g.state and g.approved > 0)');
        DB::statement('update cities c set gym_count = (select count(*) from gyms g where c.state = g.state and c.city=g.city and g.approved > 0)');
        DB::statement('update country c set updated_at = now(), gym_count = (select count(*) from gyms g where c.id = g.country_id and g.approved > 0)');

        $this->info('Total New: ' . $newCount . ', Total Exists: ' . $existCount);
        $this->info('Total New Cities: ' . $newCityCounter);
            
    }

    public function createFilename(string $city, string $state = null, string $country = null) :string
    {
        $removedChars = [" ", "'", "_", "\"", "’", "‘"];
        $filename = $city;
        $addition = '';
        if (!is_null($state)) {
            $addition = $state;
        }
        
        if (!is_null($country)) {
            $addition = $country;
        }
        
        if (!empty($addition)) {
            $filename .= '-' . $addition;
        }
        // Normalize UTF-8 characters
        $filename = preg_replace('/[^\p{L}\p{N}]/u', '-', $filename);
        $filename = preg_replace('/-+/', '-', $filename);
        $filename = trim($filename, '-');
        $filename = str_replace($removedChars, '-', strtolower($filename));
        return str_replace("--", "-", $filename);
    }
}
