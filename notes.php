<?php
$notes = array('C','D','E','F','G','A','B');
$notes_indexes = array( 'C'=> 0,'D' => 1, 'E' => 2, 'F' => 3, 'G' => 4, 'A' => 5, 'B' => 6);
$notes_to_choose = $notes;
while(true) {
    if(count($notes_to_choose)==0){
        $notes_to_choose = $notes;
    }
    
    
    //$position = rand(0,(count($notes_to_choose)-1));    


    //$start = $notes_indexes[$notes_to_choose[$position]];    
    
    array_splice($notes_to_choose,$position,1);
    $reversed = rand(0,0);
    $reversed_output = '';

    if ($reversed) {
        $reversed_output = " reversed";
    }
    
    $chord = readline("type 1 3 5 7 of " . $notes[$start] . $reversed_output . ": ");    
    $chord_array = preg_split('/\s/',$chord);
    
    $correct_chord = '';
    $index = $start;
    $i = 0;
    
    foreach($chord_array as $note) {        
        if($i==0 && $reversed)
        {
            $index = $index-1;
            if($index<0)
            $index+7;
        }
        $correct_note = $notes[$index];
        $correct_chord = $correct_chord.$correct_note . " ";
        if($reversed) {
            $index = $index - 2;            
            if ($index<0) {
                $index = $index + 7;
            }
        }
        
        else {
            $index = ($index + 2) % 7;
        }            
        $i++;
    }
    
    
    print $correct_chord. " ".$chord."\n";    

    function extract_random_element($array)
    {
        $element = false;
        $position = rand(0,(count($array)-1));    
        $array_reverse = array_reverse($array);
        $index = $array_reverse[$array[$position]];    
        $element = $array[$position];
        $array = array_splice($array,$position,1);
        return array($element, $index, $array)
    }
    
}

class NoteExtractor {
    private $initialNotes;
    private $currentNotes;
    private $notes_indexes;

    private $clearOnEmpty=true;
    public function __construct($initialArray)
    {
        $this->initialArray = $initialArray;
    }

    public function setClearOnEmpty($clearOnEmpty)
    {
        $this->setClearOnEmpty = $clearOnEmpty;
    }

}

class ChordCalculator {

}