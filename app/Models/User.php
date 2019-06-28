<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Traits\HasImageIntervention;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasImageIntervention;
    
    private $first_weeknumber;
    private $second_weeknumber;
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function slots(){
        return $this->hasMany(Slot::class);
    }


    public function carts(){
        return $this->hasMany(Cart::class);
    }


    public function isCreditValid(){
        $currentCredits = $this->credits;
        $cartCredits = $this->getTotalCartCredits();
        if($currentCredits >= $cartCredits){
            return true;
        }else{
            return false;
        }
    }


    public function getTotalCartCredits()
    {
        if(setting('pricing_type') == "per_slot"){
            return  self::carts()->count() * setting("slot_price");
        }else{
            return 0;
        }
    }


    public function classes($type = "teacher"){
        if($type=="teacher"){
            return  $this->slots()->has("student")->get();
        }else{
            return  $this->slots()->where("student_id", $this->id)->get();
        }
    }


    public function uploadPicture(Request $request, $basecode = false, $image = ""){
        if($basecode){
            $picture = time().'.png';
            $picture_path = public_path('thumbnail/'. $picture);
            file_put_contents($picture_path, $image);
        }else{
            $picture =  $this->upload($request->file('picture'), public_path('thumbnail')); 
        }
        
        $this->imageResize(public_path('/thumbnail/' . $picture), 36,36, false, public_path('/thumbnail/36/' . $picture));
        $this->imageResize(public_path('/thumbnail/' . $picture), 165, 165);

        $this->picture = $picture;
        $this->save();
    }


    public function getPicturePath($bigSize = true)
    {
        if($bigSize){
            if($this->picture){
                $path = "/thumbnail/" . $this->picture;
            }else{
                $path = "/images/placeholders/" . strtolower($this->gender) .'-lg.png';
            }
        }else{
            if($this->picture){
                $path = "/thumbnail/36/" . $this->picture;
            }else{
                $path = "/images/placeholders/" . strtolower($this->gender) .'-sm.png';
            }
        }  
        return $path;
    }


    public function clearPicture($deleteFile = true, $location = ''){
        
        if($this->picture){
            if($location){
                $file = $location .'/'. $this->picture;
                $small = $location .'/36/'. $this->picture;
            }else{
                $file = public_path("thumbnail/" . $this->picture); 
                $small = public_path("thumbnail/36/" . $this->picture); 
            }

            $this->picture = '';
            $this->save();

            if($deleteFile){
                if(file_exists($file)){
                    unlink($file);
                }
                if(file_exists($small)){
                    unlink($small);
                }
            }
        }
    }


    public function getSlots($weeknumber){
        $dates = CarbonPeriod::create( $this->getFirstDate($weeknumber), $this->getSecondDate($weeknumber) );
        $data = array();
       
        foreach($dates as $date){
            foreach(timeSequence() as $time){
                $date_formatted = $date->format('Y-m-d');
                $date_time = array(
                    'date_time' => $date_formatted . ' ' . $time,
                    'slot' => $this->slots()->whereDate("date_time", $date_formatted . ' ' . $time)->first()
                );
                array_push($data, $date_time);
               // $data[] = $date_time;
            }

        }

        return $data;
    }
   

    public function getFirstDate($weekNumber){
        $now = Carbon::now();
        return $now->setISODate($now->year, $weekNumber)->startOfWeek()->format('Y-m-d');
    }

    
    public function getSecondDate($weekNumber){
        $now = Carbon::now();
        return $last_day = $now->setISODate($now->year, $weekNumber + 1)->endOfWeek()->format('Y-m-d');
    }
}
