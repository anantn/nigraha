<?php
class Department extends AppModel {
	var $name='Department';
	
	var $department_name;
		
	var $validate=array();

	var $hasMany=array('Student' =>
						array('className' => 'Student',
							'conditions'    => '',
                            'order'         => '',
                            'limit'         => '',
                            'foreignKey'    => 'demartment_name',
                            'dependent'     => false,
                            'exclusive'     => false,
                            'finderQuery'   => ''
                         )
                  );
				  
	var $hasMany=array('Faculty' =>
						array('className' => 'Faculty',
							'conditions'    => '',
                            'order'         => '',
                            'limit'         => '',
                            'foreignKey'    => 'demartment_name',
                            'dependent'     => false,
                            'exclusive'     => false,
                            'finderQuery'   => ''
                         )
                  );
	
	var $hasMany=array('Staff' =>
						array('className' => 'Staff',
							'conditions'    => '',
                            'order'         => '',
                            'limit'         => '',
                            'foreignKey'    => 'demartment_name',
                            'dependent'     => false,
                            'exclusive'     => false,
                            'finderQuery'   => ''
                         )
                  );
				  
	var $hasMany=array('Course' =>
						array('className' => 'Course',
							'conditions'    => '',
                            'order'         => '',
                            'limit'         => '',
                            'foreignKey'    => 'demartment_name',
                            'dependent'     => true,
                            'exclusive'     => false,
                            'finderQuery'   => ''
                         )
                  );
}
?>