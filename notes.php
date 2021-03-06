<?php

$noteExtractor = new NoteExtractor();
while(true)
{
    $step = $noteExtractor->getRandomStep(); //select random step from tonality, currently C Major

    $chord = $noteExtractor->getChord($step);
    readline("Type chord at step ". ($step+1)." of C Major: ");

    print "\033[01;31m" . implode(' ',$chord)."\033[0m" . "\n";
}



class NoteExtractor {

    const CMajor = array('C','D','E','F','G','A','B');

    private $initialNotes;
    private $currentNotes;
    private $notesIndexes;

    private $restartOnEmpty = true;
    private $clearOnExtract = true; 

    public function __construct( $tonality = false )
    {
        //later we'll update array shift to match the tonality        
        $this->initialNotes = NoteExtractor::CMajor;
        $this->currentNotes = $this->initialNotes;
        $this->notesIndexes = array_flip($this->currentNotes);        
        
    }

    public function getRandomStep()
    {
        $position = rand(0,(count($this->currentNotes)-1)); 
        $step = $this->notesIndexes[$this->currentNotes[$position]];        
        if($this->clearOnExtract)
        {
            array_splice($this->currentNotes,$position,1);
        }

        if($this->restartOnEmpty) 
        {
            if ( count( $this->currentNotes ) == 0 )
            {
                $this->currentNotes = $this->initialNotes;
            }
        }

        //note that step starts with 0 not with 1        
        return $step;
    }

    public function getChord( $step, $is_reversed = false )
    {
        //pls note that step starts with 0, not with 1
        $chord = array();
        $index = $step;
        for($i = 0; $i<4; $i++) 
        {   
            array_push($chord,$this->initialNotes[$index]);          
            $index = $index + 2;                                
            if ($index > 6)
            {
                $index = $index % 7;
            }   
                     
        }
        return $chord;
    }



}

class CircleOfFifth { 
    private $circle;
    public function __construct()
    {
        $this->circle['major']['C']['minor'] == 'Am';
        $this->circle['major']['C']['signs'] == '';
        


    }
}