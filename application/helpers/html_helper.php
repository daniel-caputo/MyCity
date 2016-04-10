<?php

    if(!function_exists('assets')){
        function assets($file, $attributes=array()){
            $file = preg_replace('#/+#','/',$file);
            $arr = explode('/', $file);

            $attr=null;
            foreach($attributes as $key => $value){
                $attr .= $key.'="'.$value.'" ';
            }

            if(file_exists(FCPATH.'/assets/'.$file))
            {
                if($arr[0] == 'img'){
                    return "<img src='/assets/{$file}' {$attr} />";
                }

                if($arr[0] == 'css'){
                    return "<link rel=\"stylesheet\" type=\"text/css\" href=\"/assets/{$file}\"/>";
                }

                if($arr[0] == 'js'){
                    return "<script type=\"text/javascript\" src=\"/assets/{$file}\"></script>";
                }

            }

           return "File {$file} doesnt exist";
        }
    }
