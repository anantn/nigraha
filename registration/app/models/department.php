<?php
class Department extends AppModel {
	var $name='Department';
	
	var $deptName;
	VAR $deptid;
		
	var $validate=array();

	var $hasMany=array('Student' =>
						array('className' => 'Student',
							'conditions'    => '',
                            'order'         => '',
                            'limit'         => '',
                            'foreignKey'    => 'deptid',
                            'dependent'     => false,
                            'exclusive'     => false,
                            'finderQuery'   => ''
                         ),
					/*'Faculty' =>
						array('className' => 'Faculty',
							'conditions'    => '',
                            'order'         => '',
                            'limit'         => '',
                            'foreignKey'    => 'deptid',
                            'dependent'     => false,
                            'exclusive'     => false,
                            'finderQuery'   => ''
                         ),
					'Staff' =>
						array('className' => 'Staff',
							'conditions'    => '',
                            'order'         => '',
                            'limit'         => '',
                            'foreignKey'    => 'deptid',
                            'dependent'     => false,
                            'exclusive'     => false,
                            'finderQuery'   => ''
						),*/
					'Course' =>
						array('className' => 'Course',
							'conditions'    => '',
                            'order'         => '',
                            'limit'         => '',
                            'foreignKey'    => 'deptid',
                            'dependent'     => true,
                            'exclusive'     => false,
                            'finderQuery'   => ''
                         )
                  );
}
?>
