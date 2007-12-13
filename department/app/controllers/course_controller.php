<?php

class CourseController extends AppController
{
    var $helpers = array('Html', 'Form', 'Ajax', 'Javascript');
    var $uses = array('Faculty', 'Course');
    
    public function index()
    {
        $qres = $this->Faculty->query('SELECT id, courses FROM faculties');
        $courses = array();
        foreach ($qres as $fac) {
            $split = explode("\n", $fac['faculties']['courses']);
            foreach ($split as $course) {
                if (in_array($course, array_keys($courses)))
                    $courses[$course][] = $fac['faculties']['id'];
                else
                    $courses[$course] = array($fac['faculties']['id']);
            }
        }
        $this->set('values', $courses);
    }
}

?>