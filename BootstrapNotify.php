<?php
/**
 * Created by PhpStorm.
 * User: phpNT - http://phpnt.com
 * Date: 22.04.2016
 * Time: 13:47
 */
namespace phpnt\bootstrapNotify;
use yii\bootstrap\Widget;
use phpnt\animateCss\AnimateCssAsset;
class BootstrapNotify extends Widget
{
    public $icon;
    public $icon_type          = 'class';
    public $title;
    public $message;
    public $url;
    public $target;
    public $element            = 'body';
    public $position           = 'fixed';
    public $type               = 'info';
    public $allow_dismiss      = 1;
    public $newest_on_top      = 0;
    public $showProgressbar    = 0;
    public $placement_from     = 'top';
    public $placement_align    = 'right';
    public $offset             = 20;
    public $offset_x           = 20;
    public $offset_y           = 20;
    public $spacing            = 10;
    public $z_index            = 10001;
    public $timer              = 1000;
    public $delay              = 5000;
    public $url_target         = '_blank';
    public $mouse_over         = 0;
    public $animate_enter      = 'animated fadeInDown';
    public $animate_exit       = 'animated fadeOutUp';
    // {0} = type
    // {1} = title
    // {2} = message
    // {3} = url
    // {4} = target
    public $template           = '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert"><button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button><span data-notify="icon"></span><span data-notify="title">{1}</span><span data-notify="message">{2}</span><div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div><a href="{3}" target="{4}" data-notify="url"></a></div>';
    public function init()
    {
        parent::init();
        $session = \Yii::$app->session;
        $message = $session->get('message');
        $view = $this->getView();
        AnimateCssAsset::register($view);
        BootstrapNotifyAsset::register($view);
        if(isset($message)) {
            $this->setOptions($message);
            \Yii::$app->view->registerJs("
                $.notify({
                    icon:           '".$this->icon."',
                    title:          '".$this->title."',
               message:        ' ".$this->message."',
               url:            '".$this->url."',
               target:         '".$this->target."',
                },{
                    element:        '".$this->element."',
                    position:       '".$this->position."',
                    type:           '".$this->type."',
                    allow_dismiss:  ".$this->allow_dismiss.",
                    newest_on_top:  ".$this->newest_on_top.",
                    showProgressbar: ".$this->showProgressbar.",
                    placement: {
                        from:       '".$this->placement_from."',
                        align:      '".$this->placement_align."'
                    },
                    offset:         ".$this->offset.",
                    offset: {
                        x:          ".$this->offset_x.",
                        y:          ".$this->offset_y."
                    },
                    spacing:        ".$this->spacing.",
                    z_index:        ".$this->z_index.",
                    delay:          ".$this->delay.",
                    timer:          ".$this->timer.",
                    url_target:     '".$this->url_target."',
                    mouse_over:     ".$this->mouse_over.",
                    animate: {
                        enter:      '".$this->animate_enter."',
                        exit:       '".$this->animate_exit."'
                    },
                    onShow: null,
                    onShown: null,
                    onClose: null,
                    onClosed: null,
                    icon_type:      '".$this->icon_type."',
                    template:       '".$this->template."'
                });
            ");
            $session->remove('message');
        }
    }
    private function setOptions($value) {
        if(isset($value['icon']))
            $this->icon = $value['icon'];
        if(isset($value['title']))
            $this->title = $value['title'];
        if(isset($value['message']))
            $this->message = $value['message'];
        if(isset($value['url']))
            $this->url = $value['url'];
        if(isset($value['target']))
            $this->target = $value['target'];
        if(isset($value['element']))
            $this->element = $value['element'];
        if(isset($value['position']))
            $this->position = $value['position'];
        if(isset($value['type']))
            $this->type = $value['type'];
        if(isset($value['allow_dismiss']))
            $this->allow_dismiss = $value['allow_dismiss'];
        if(isset($value['newest_on_top']))
            $this->newest_on_top = $value['newest_on_top'];
        if(isset($value['showProgressbar']))
            $this->showProgressbar = $value['showProgressbar'];
        if(isset($value['placement_from']))
            $this->placement_from = $value['placement_from'];
        if(isset($value['placement_align']))
            $this->placement_align = $value['placement_align'];
        if(isset($value['offset']))
            $this->offset = $value['offset'];
        if(isset($value['offset_x']))
            $this->offset_x = $value['offset_x'];
        if(isset($value['offset_y']))
            $this->offset_y = $value['offset_y'];
        if(isset($value['spacing']))
            $this->spacing = $value['spacing'];
        if(isset($value['z_index']))
            $this->z_index = $value['z_index'];
        if(isset($value['delay']))
            $this->delay = $value['delay'];
        if(isset($value['timer']))
            $this->timer = $value['timer'];
        if(isset($value['url_target']))
            $this->url_target = $value['url_target'];
        if(isset($value['mouse_over']))
            $this->mouse_over = $value['mouse_over'];
        if(isset($value['animate_enter']))
            $this->animate_enter = $value['animate_enter'];
        if(isset($value['animate_exit']))
            $this->animate_exit = $value['animate_exit'];
        if(isset($value['icon_type']))
            $this->icon_type = $value['icon_type'];
        if(isset($value['template']))
            $this->template = $value['template'];
    }
}
