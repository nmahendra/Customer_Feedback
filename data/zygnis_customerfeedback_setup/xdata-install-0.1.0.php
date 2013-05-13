<?php

$installer = $this;

$model = Mage::getModel('zygnis_customerfeedback/customerfeedback');

$dataRows = array(
                array(
                        'title' => 'This is the best service I can think of ever receiving from an online seller.',
                        'description' => 'This is the best service I can think of ever receiving from an online seller.',                    
                        'customer' => 'Chris',
                ),  
                array(
                        'title' => 'Really love your website and products bought through it. So much cheaper and great customer service',
                        'description' => 'Really love your website and products bought through it. So much cheaper and great customer service',                    
                        'customer' => 'Christophe',
                ),  
                array(
                        'title' => 'I received the de-railleur within 2 days of dispatch = nice work.',
                        'description' => 'I received the de-railleur within 2 days of dispatch = nice work.',                    
                        'customer' => 'Chris',
                ),
                array(
                        'title' => 'hanks Very Much .. great service !!',
                        'description' => 'hanks Very Much .. great service !!',                    
                        'customer' => 'Benn',
                )
    
);

foreach ($dataRows as $data){
    $model->setData($data)->setOrigData()->save();
}
