<?php

// Atliko Mantas Marcinkevičius

// KLASES

class Bidder {
    protected $name;
    protected $mail;
    protected $gender;
    function __construct($name, $mail, $gender){
        $this->name = $name;
        $this->mail = $mail;
        $this->gender = $gender;
    }
    public function get_name(){
    	return $this->name;
    }
    public function get_mail(){
    	return $this->mail;
    }
    public function get_gender(){
    	return $this->gender;
    }
}


class Bid {
    protected $name;
    protected $date;
    protected $value;
    protected $sold;
    function __construct($name, $date, $value){
        $this->name = $name;
        $this->date = $date;
        $this->value = $value;
    }
    public function get_name(){
    	return $this->name;
    }
    public function get_date(){
    	return $this->date;
    }
    public function get_value(){
    	return $this->value;
    }
    // Sekancios 2 funkcijos reikalingos, jei bidas sekmingas
    public function sold(){

        $this->sold = 1;
    }
    public function get_sold(){
        return $this->sold;
    }
}

class Article {
	protected $article;
    protected $anotation;
    protected $price;
    protected $closed;
    public $bids = [];
    function __construct($article, $anotation, $price){
    	$this->article = $article;
        $this->anotation = $anotation;
        $this->price = $price;
    }
    public function close_bid($time){
    	$this->closed = $time;
        $a = sizeof($this->bids);
        if($a>0){
            $this->bids[$a-1]->sold();
        }
    }
    public function bid($a){
    	$this->bids[] = $a;
    }
    public function get_article(){
    	return $this->article;
    }
    public function get_anotation(){
    	return $this->anotation;
    }
    public function get_price(){
    	return $this->price;
    }
    public function get_closed(){
    	return $this->closed;
    }
    public function get_bids(){
        
    	return $this->bids;
    }
}

// Funkcija atsakinga uz Atribute objektu spausdinima:
function printing($objektas){
    echo "<dt>{$objektas->get_article()}</dt>
    <dd><p>{$objektas->get_anotation()}</p>
    <p>Price: {$objektas->get_price()}&euro;</p>";
    if($objektas->get_closed()!= NULL){
        echo "<p>Ended {$objektas->get_closed()}</p>";
    }
    echo "<p><ul>";
    foreach(array_reverse($objektas->get_bids()) as $bid){
        echo "<li>{$bid->get_name()}; {$bid->get_value()}&euro;; {$bid->get_date()};";
        if($bid->get_sold()){
            echo " Sold";
        }
    }
    echo "</ul></p>
    </dd>";
}


// VISA REIKALINGA INFORMACIJA

// Laikrodzio aukciono informacija
$a1 = "Gold Watch";
$p1 = 10;
$an1 = "New with tags: A brand-new, unused, and unworn item (including handmade items) in the original packaging
    (such as the original box or bag) and/or with the original tags attached";
$d1 = '2015-10-26 15:45';
// Svarko auksiono informacija
$a2  = "Linen Jacket";
$p2  = 135;
$an2 = "It has a smooth chalk stripe pattern which gives the suit a refined look. The 6 buttons of his double
    breasted jacket are all buttoned up with the exception of one, it adds a casual touch to an elegant look.<br>
    The jacket is the same length all around, it has vents at either side, there's a pocket on either side and there's
    a breast pocket which contains a stylish pocket square.";
$d2  = "2015-10-29 12:00";
// Rasiklio auksiono informacija
$a3  = "Silver Pen";
$p3  = 100;
$an3 = " Sterling silver ball-point pen with classically elegant styling for a smooth, elegant writing experience. 
Trademark conical tip. Patented propel-repel ball pen mechanism. Manufacturer's lifetime mechanical guarantee.
Includes 1 Black Medium Ball-Point Refill (8513) in pen";
$d3  = "2015-10-25 12:00";
// Skulpturos auksiono informacija
$a4  = "Glass sculpture";
$p4  = 960;
$an4 = " Hand blown purple glass pumpkin with dichroic glass and hand pulled yellow cane. Dimensions: 7\" H x 7\" 
diameter";
$d4  = "2015-10-27 12:00";
// Gitaros auksiono informacija
$a5  = "Guitar";
$p5  = 98;
$an5 = "Richwood Gypsy Jazz Acoustic Guitar or Maccaferri. Great authentic tone and action. Comes with soft/hard 
case. NB there is a choking issue at the 16th fret, easily fixed with a set-up. ";
$d5  = "2015-10-28 12:00";


// OBJEKTU KURIMAS

//Laikrodzio bidai
$Watch = new Article($a1, $an1, $p1);
$Watch->bid(new Bid("Rose", "2015-10-25 12:22", 12));
$Watch->bid(new Bid("Rush", "2015-10-26 9:13", 13));
$Watch->bid(new Bid("Bert", "2015-10-26 15:00", 15.5));
$Watch->close_bid($d1);
//Svarko bidai
$Jacket = new Article($a2, $an2, $p2);
$Jacket->bid(new Bid("Miguel", "2015-10-28 15:10", 140));
$Jacket->bid(new Bid("Rush", "2015-10-29 9:13", 155));
$Jacket->close_bid($d2);
//Rasiklio bidai
$Pen = new Article($a3, $an3, $p3);
$Pen->bid(new Bid("Sarrah", "2015-10-23 15:10", 105));
$Pen->bid(new Bid("John", "2015-10-24 9:13", 115));
$Pen->bid(new Bid("Benny", "2015-10-25 10:23", 145));
$Pen->close_bid($d3);
//Skulpturos bidai
$Sculpture = new Article($a4, $an4, $p4);
$Sculpture->bid(new Bid("Rush", "2015-10-26 16:50", 1050));
$Sculpture->bid(new Bid("Sarrah", "2015-10-27 8:53", 1150));
$Sculpture->bid(new Bid("Rose", "2015-10-27 11:34", 1655));
$Sculpture->close_bid($d4);
//Gitaros bidai
$Guitar = new Article($a5, $an5, $p5);
$Guitar->bid(new Bid("Margarette", "2015-10-26 14:50", 100));
$Guitar->bid(new Bid("Rush", "2015-10-27 15:53", 120));
$Guitar->bid(new Bid("Bert", "2015-10-27 16:34", 125));
$Guitar->bid(new Bid("Miguel", "2015-10-28 10:22", 148));
$Guitar->close_bid($d5);

// SPAUSDINIMAS

echo "<dl>";
//if($Watch->get_bids()->get_sold()){

printing($Watch);
printing($Jacket);
printing($Pen);
printing($Sculpture);
printing($Guitar    );

echo "</dl>";