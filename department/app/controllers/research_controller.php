<?php

class ResearchController extends AppController
{
    var $helpers = array('Html', 'Form', 'Ajax', 'Javascript');
    var $uses = array('Faculty', 'Research');
    
    private function retrieve($key)
    {
        $qres = $this->Faculty->query('SELECT id, '.$key.' FROM faculties');   
        $values = array();
        foreach ($qres as $fac) {
            $split = explode("\n", $fac['faculties'][$key]);
            foreach ($split as $value) {
                if (in_array($value, array_keys($values)))
                    $values[$value][] = $fac['faculties']['id'];
                else
                    $values[$value] = array($fac['faculties']['id']);
            }
        }
        return $values;
    }
    
    public function index()
    {
        $this->set('values', $this->retrieve('research'));
    }
    
    public function publications()
    {
        $this->set('values', $this->retrieve('publications'));
    }
}

?>