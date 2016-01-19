<?php
/**
 * Created by PhpStorm.
 * User: moussa
 * Date: 15/01/2016
 * Time: 16:37
 */

namespace Core\HTML;


class Form{
    protected $data;
    public $surround = 'p';

    public function __construct($data=[]){
        $this->data = $data;
    }
    protected function surround($html){
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    public   function getValue($index){
        if(is_object($this->data)){
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }
    public   function input($name, $label, $options =[]){
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->surround(
            '<input type="'. $type .'" name="'.$name.'"value="'.$this->getValue($name).'">'
        );
    }
    public   function submit(){
        return $this->surround('<button type="submit">Envoyer</button>');
    }


}