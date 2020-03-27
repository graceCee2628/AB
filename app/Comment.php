<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
  public function user(){
  	return $this->belongsTo('App\User');
  } 

  public function tickets(){
  	return $this->belongsTo('App\Ticket');
  }         
}
