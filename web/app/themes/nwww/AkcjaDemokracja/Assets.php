<?php
namespace AkcjaDemokracja;
trait Assets{

    function _imgr($img) {
        return get_template_directory() . '/dist/images/' . $img;
    }

function _img($img)
{
return get_template_directory_uri() . '/dist/images/' . $img;
}

function _eImg($img)
{
echo $this->_img($img);
}

function _assetUrl($asset){
return get_template_directory_uri().'/dist/'.$asset;
}
};