<?php

/* @galleries/shortcode/gallery.twig */
class __TwigTemplate_0c13df490983941de36dea60a73435884e1c679a8c71b64b540cf2b58050f57e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'gallery_before' => array($this, 'block_gallery_before'),
            'gallery_attributes' => array($this, 'block_gallery_attributes'),
            'additionalGridGalleryClass' => array($this, 'block_additionalGridGalleryClass'),
            'photos_before' => array($this, 'block_photos_before'),
            'photos_attributes' => array($this, 'block_photos_attributes'),
            'photos' => array($this, 'block_photos'),
            'photos_after' => array($this, 'block_photos_after'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["style"] = $this->loadTemplate("@galleries/shortcode/style.twig", "@galleries/shortcode/gallery.twig", 1);
        // line 2
        echo "
";
        // line 3
        if ((array_key_exists("gallery", $context) &&  !twig_test_empty((isset($context["gallery"]) ? $context["gallery"] : null)))) {
            // line 4
            echo "\t";
            $this->displayBlock('gallery_before', $context, $blocks);
            // line 14
            echo "
\t<div
\t\t";
            // line 16
            $this->displayBlock('gallery_attributes', $context, $blocks);
            // line 193
            echo ">

\t\t";
            // line 195
            if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "preload", array()), "enabled", array()) == "true") || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "preload", array()), "enabled", array()) == null))) {
                // line 196
                echo "\t\t\t";
                if (((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "preload", array()), "icon_name", array()) == "default") || ($this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "isPro", array(), "method") != true)) || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "preload", array()), "enabled", array()) == null))) {
                    // line 197
                    echo "\t\t\t\t<div class=\"gallery-loading\">
\t\t\t\t\t<div class=\"blocks\">
\t\t\t\t\t\t<div class=\"block\"></div>
\t\t\t\t\t\t<div class=\"block\"></div>
\t\t\t\t\t\t<div class=\"block\"></div>
\t\t\t\t\t\t<div class=\"block\"></div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
                } else {
                    // line 206
                    echo "\t\t\t\t<div class=\"gallery-loading\">
\t\t\t\t\t<div class=\"la-";
                    // line 207
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "preload", array()), "icon_name", array()), "html", null, true);
                    echo "\" style=\"color: ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "preload", array()), "background", array()), "html", null, true);
                    echo "\">
\t\t\t\t\t\t";
                    // line 208
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "preload", array()), "icon_items", array())));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 209
                        echo "\t\t\t\t\t\t\t<div></div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 211
                    echo "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
                }
                // line 214
                echo "\t\t";
            }
            // line 215
            echo "
\t\t";
            // line 216
            $this->displayBlock('photos_before', $context, $blocks);
            // line 218
            echo "
\t\t";
            // line 219
            if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "enabled", array())) {
                // line 220
                echo "            <div id=\"social-share-html\" style=\"display:none;\">
                ";
                // line 221
                echo $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "html", array());
                echo "
                ";
                // line 223
                echo "            </div>
        ";
            }
            // line 225
            echo "
        <div id=\"gallery-sharing-top\"></div>
\t\t<div
\t\t\t";
            // line 228
            $this->displayBlock('photos_attributes', $context, $blocks);
            // line 231
            echo ">

\t\t\t";
            // line 233
            $this->displayBlock('photos', $context, $blocks);
            // line 241
            echo "
\t\t\t<div class=\"grid-gallery-clearfix\"></div>
\t\t</div>
        <div id=\"gallery-sharing-bottom\"></div>

\t\t<div class=\"grid-gallery-clearfix\"></div>

\t\t";
            // line 248
            $this->displayBlock('photos_after', $context, $blocks);
            // line 250
            echo "\t</div>
\t
\t<!-- Gallery by Supsystic plugin ";
            // line 252
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "getConfig", array(), "method"), "get", array(0 => "plugin_version"), "method"), "html", null, true);
            echo "  ";
            if (($this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "isPro", array(), "method") == true)) {
                echo " / ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "getConfig", array(), "method"), "get", array(0 => "pro_plugin_version"), "method"), "html", null, true);
            }
            echo " -->
";
        }
    }

    // line 4
    public function block_gallery_before($context, array $blocks = array())
    {
        // line 5
        echo "\t\t";
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "true"))) {
            // line 6
            echo "\t\t\t<style>
\t\t\t\t #grid-gallery-";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "random_val", array()), "html", null, true);
            echo " .";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "effect", array()), "html", null, true);
            echo " .hi-icon { color: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "color", array()), "html", null, true);
            echo " !important; background: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "background", array()), "html", null, true);
            echo " !important; }
\t\t\t\t #grid-gallery-";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "random_val", array()), "html", null, true);
            echo " .";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "effect", array()), "html", null, true);
            echo " .hi-icon:hover { color: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "hover_color", array()), "html", null, true);
            echo " !important; background: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "background_hover", array()), "html", null, true);
            echo " !important; }
\t\t\t\t #grid-gallery-";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "random_val", array()), "html", null, true);
            echo " .hi-icon { width: ";
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "size", array()) * 2), "html", null, true);
            echo "px !important; height: ";
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "size", array()) * 2), "html", null, true);
            echo "px !important; }
\t\t\t\t #grid-gallery-";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "random_val", array()), "html", null, true);
            echo " .hi-icon:before { font-size: ";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "size", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "size", array()), 16)) : (16)), "html", null, true);
            echo "px !important; line-height: ";
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "size", array()) * 2), "html", null, true);
            echo "px !important; }
\t\t\t</style>
\t\t";
        }
        // line 13
        echo "\t";
    }

    // line 16
    public function block_gallery_attributes($context, array $blocks = array())
    {
        // line 17
        echo "\t\t\tid=\"grid-gallery-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "random_val", array()), "html", null, true);
        echo "\"
\t\t\tdata-gg-id=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()), "html", null, true);
        echo "\"
\t\t\tdata-title=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "title", array()), "html", null, true);
        echo "\"
\t\t\tdata-grid-type=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()), "html", null, true);
        echo "\"
\t\t\tdata-offset=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "distance", array()), "html", null, true);
        echo "\"
\t\t\tdata-area-position=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "position", array()), "html", null, true);
        echo "\"
\t\t\tdata-icons=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()), "html", null, true);
        echo "\"
\t\t\tdata-preloader=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "preload", array()), "enabled", array()), "html", null, true);
        echo "\"
\t\t\t";
        // line 25
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == "2")) {
            // line 26
            echo " \t\t\t\tdata-width=\"auto\"
 \t\t\t";
        } else {
            // line 28
            echo " \t\t\t\tdata-width=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width", array()), "html", null, true);
            if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width_unit", array()) == 1)) {
                echo "%";
            }
            echo "\"
 \t\t\t";
        }
        // line 30
        echo "\t\t\tdata-height=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height", array()), "html", null, true);
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height_unit", array()) == 1)) {
            echo "%";
        }
        echo "\"
\t\t\tdata-padding=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "padding", array()), "html", null, true);
        echo "\"
\t\t\tdata-quicksand=\"";
        // line 32
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "quicksand", array()), "enabled", array()) == "1")) {
            echo "enabled";
        } else {
            echo "disabled";
        }
        echo "\"
\t\t\tdata-quicksand-duration=\"";
        // line 33
        if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "quicksand", array()), "duration", array()))) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "quicksand", array()), "duration", array()), "html", null, true);
        } else {
            echo "none";
        }
        echo "\"
\t\t\t\t";
        // line 34
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "enabled", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "enabled", array()) == "false"))) {
            // line 35
            echo "\t\t\t\t\tdata-popup-type=\"disable\"
\t\t\t\t";
        } else {
            // line 37
            echo "\t\t\t\t\tdata-popup-theme=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "theme", array()), "html", null, true);
            echo "\"
\t\t\t\t";
        }
        // line 39
        echo "\t\t\t\t";
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "0") && ((isset($context["mobile"]) ? $context["mobile"] : null) != "true"))) {
            // line 40
            echo "\t\t\t\t\tdata-popup-type=\"colorbox\"
\t\t\t\t\tdata-popup-fadeOut=\"";
            // line 41
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "fadeOut", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "fadeOut", array()), 300)) : (300)), "html", null, true);
            echo "\"
\t\t\t\t";
        }
        // line 43
        echo "\t\t\t\t";
        if (((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "1") && ((isset($context["mobile"]) ? $context["mobile"] : null) != "true")) && ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "enabled", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "enabled", array()), "true")) : ("true")) == "true"))) {
            // line 44
            echo "\t\t\t\t\tdata-popup-type=\"pretty-photo\"
\t\t\t\t";
        }
        // line 46
        echo "\t\t\t\t";
        if (((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "2") && ((isset($context["mobile"]) ? $context["mobile"] : null) != "true")) && ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "enabled", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "enabled", array()), "true")) : ("true")) == "true"))) {
            // line 47
            echo "\t\t\t\t\tdata-popup-type=\"photobox\"
\t\t\t\t";
        }
        // line 49
        echo "\t\t\t\t";
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == "3")) {
            // line 50
            echo "\t\t\t\t\tdata-columns-number=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array()), "columns", array()), "number", array()), "html", null, true);
            echo "\"
\t\t\t\t";
        }
        // line 52
        echo "\t\t\t\t";
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "captions", array()) == "on")) {
            // line 53
            echo "\t\t\t\t\tdata-popup-captions=\"hide\"
\t\t\t\t";
        }
        // line 55
        echo "
\t\t\t\tdata-popup-image-text=\"";
        // line 56
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "imageText", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "imageText", array()), "title")) : ("title")), "html", null, true);
        echo "\"

\t\t\t\t";
        // line 58
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "popupwidth", array()) == "")) {
            echo " 
\t\t\t\t\tdata-popup-widthsize=\"auto\"
\t\t\t\t";
        } else {
            // line 60
            echo " 
\t\t\t\t\tdata-popup-widthsize=\"";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "popupwidth", array()), "html", null, true);
            echo "\"
\t\t\t\t";
        }
        // line 63
        echo "
\t\t\t\t";
        // line 64
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "popupheight", array()) == "")) {
            echo " 
\t\t\t\t\tdata-popup-heightsize=\"auto\"
\t\t\t\t";
        } else {
            // line 66
            echo " 
\t\t\t\t\tdata-popup-heightsize=\"";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "popupheight", array()), "html", null, true);
            echo "\"
\t\t\t\t";
        }
        // line 69
        echo "
\t\t\t";
        // line 70
        $context["popup_i18n_words"] = array("close" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("close")), "next" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("next")), "previous" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("previous")), "start_slideshow" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("start slideshow")), "stop_slideshow" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("stop slideshow")), "image" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("image")), "of" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("of")), "prev" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("prev")), "cExpand" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Expand")), "cPrevious" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Previous")), "cNext" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Next")), "cExpandStr" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Expand the image")));
        // line 71
        echo "\t\t\tdata-popup-i18n-words=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter((isset($context["popup_i18n_words"]) ? $context["popup_i18n_words"] : null)));
        echo "\"

            data-popup-slideshow=\"";
        // line 73
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "slideshow", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "slideshow", array()), "false")) : ("false")), "html", null, true);
        echo "\"
\t\t\tdata-popup-slideshow-speed=\"";
        // line 74
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "slideshowSpeed", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "slideshowSpeed", array()), 2500)) : (2500)), "html", null, true);
        echo "\"
\t\t\tdata-popup-hoverstop=\"";
        // line 75
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "popupHoverStop", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "popupHoverStop", array()), "true")) : ("true")), "html", null, true);
        echo "\"
\t\t\tdata-popup-slideshow-auto=\"";
        // line 76
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "slideshowAuto", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "slideshowAuto", array()), "false")) : ("false")), "html", null, true);
        echo "\"
\t\t\tdata-popup-background=\"";
        // line 77
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "background", array()), "html", null, true);
        echo "\"
\t\t\tdata-popup-transparency=\"";
        // line 78
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "transparency", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "transparency", array()), 30)) : (30)), "html", null, true);
        echo "\"
\t\t\tdata-popup-disable-history=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "disableHistory", array()), "html", null, true);
        echo "\"
\t\t\tdata-fullscreen=\"";
        // line 80
        echo (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "fullscreen", array())) ? ("true") : ("false"));
        echo "\"
\t\t\tdata-hide-tooltip=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "tooltip", array()), "html", null, true);
        echo "\"
\t\t\tdata-caption-font-family=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "font_family", array()), "html", null, true);
        echo "\"
\t\t\tdata-caption-text-size=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
        echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
        echo "\"
\t\t\tdata-is-mobile=\"";
        // line 84
        echo twig_escape_filter($this->env, ((array_key_exists("isMobile", $context)) ? (_twig_default_filter((isset($context["isMobile"]) ? $context["isMobile"] : null), "0")) : ("0")), "html", null, true);
        echo "\"
\t\t\tdata-caption-mobile=\"";
        // line 85
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "isMobile", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "isMobile", array()), "false")) : ("false")), "html", null, true);
        echo "\" ";
        // line 86
        echo "\t\t\tdata-hide-long-tltp-title=\"";
        echo ((($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "hideLongTooltipTitles", array()) == "on")) ? ("1") : ("0"));
        echo "\"
\t\t\tdata-caption-disabled-on-mobile=\"";
        // line 87
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "isDisableMobileCaption", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "isDisableMobileCaption", array()), "false")) : ("false")), "html", null, true);
        echo "\"
\t\t\t";
        // line 88
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "lazyload", array()), "enabled", array()) == "1")) {
            echo " data-lazyload-enable='1' ";
        }
        // line 89
        echo "\t\t\t";
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()) == "polaroid")) {
            // line 90
            echo "\t\t\t\tdata-polaroid-animation=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidAnimation", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidAnimation", array()), "true")) : ("true")), "html", null, true);
            echo "\"
\t\t\t\tdata-polaroid-scattering=\"";
            // line 91
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidScattering", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidScattering", array()), "true")) : ("true")), "html", null, true);
            echo "\"
\t\t\t\tdata-polaroid-frame-width=\"";
            // line 92
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidFrameWidth", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidFrameWidth", array()), 20)) : (20)), "html", null, true);
            echo "\"
\t\t\t";
        }
        // line 94
        echo "\t\t\t";
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == "3")) {
            // line 95
            echo "\t\t\t\tdata-responsive-colums=\"";
            echo twig_escape_filter($this->env, twig_jsonencode_filter((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "responsiveColumns", array()), "")) : (""))));
            echo "\"
\t\t\t";
        }
        // line 97
        echo "\t\t\t";
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "horizontalScroll", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "horizontalScroll", array()), "enabled", array()) == "true"))) {
            // line 98
            echo "\t\t\t\tdata-horizontal-scroll=\"";
            echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "horizontalScroll", array())));
            echo "\"
\t\t\t";
        }
        // line 100
        echo "\t\t\t";
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "personal", array()) == "true")) {
            // line 101
            echo "\t\t\t\tdata-thumb-overlay-personal=\"1\"
\t\t\t";
        }
        // line 103
        echo "\t\t\tdata-popup-placement-type=\"";
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "popup", array(), "any", false, true), "placementType", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "popup", array(), "any", false, true), "placementType", array()), 0)) : (0)), "html", null, true);
        echo "\"

            ";
        // line 105
        $context["imageSharingButPos"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "imageSharing", array()), "buttonsPosition", array());
        // line 106
        echo "            ";
        $context["imageSharingWrapperClass"] = ((isset($context["imageSharingButPos"]) ? $context["imageSharingButPos"] : null) . " ");
        // line 107
        echo "            ";
        if ((((isset($context["imageSharingButPos"]) ? $context["imageSharingButPos"] : null) == "top") || ((isset($context["imageSharingButPos"]) ? $context["imageSharingButPos"] : null) == "bottom"))) {
            // line 108
            echo "                ";
            $context["imageSharingWrapperClass"] = ((isset($context["imageSharingWrapperClass"]) ? $context["imageSharingWrapperClass"] : null) . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "imageSharing", array()), "buttonsAlignHorizontal", array()));
            // line 109
            echo "            ";
        } else {
            // line 110
            echo "                    ";
            $context["imageSharingWrapperClass"] = (((isset($context["imageSharingWrapperClass"]) ? $context["imageSharingWrapperClass"] : null) . "vertical ") . $this->getAttribute($this->getAttribute($this->getAttribute(            // line 111
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "imageSharing", array()), "buttonsAlignVertical", array()));
            // line 112
            echo "            ";
        }
        // line 113
        echo "
            ";
        // line 124
        echo "
            ";
        // line 125
        $context["socialSharing"] = array("enabled" => $this->getAttribute($this->getAttribute(        // line 126
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "enabled", array()), "gallerySharing" => array("enabled" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 128
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "gallerySharing", array()), "enabled", array()), "position" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 129
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "gallerySharing", array()), "buttonsPosition", array())), "imageSharing" => array("enabled" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 132
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "imageSharing", array()), "enabled", array()), "wrapperClass" => $this->getAttribute(        // line 133
$this, "getSocialSharingWrapperClass", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 134
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "imageSharing", array()), "buttonsPosition", array()), 1 => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 135
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "imageSharing", array()), "buttonsAlignHorizontal", array()), 2 => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 136
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "imageSharing", array()), "buttonsAlignVertical", array())), "method")), "popupSharing" => array("enabled" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 140
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "popupImageSharing", array()), "enabled", array()), "wrapperClass" => $this->getAttribute(        // line 141
$this, "getSocialSharingWrapperClass", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 142
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "popupImageSharing", array()), "buttonsPosition", array()), 1 => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 143
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "popupImageSharing", array()), "buttonsAlignHorizontal", array()), 2 => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 144
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "popupImageSharing", array()), "buttonsAlignVertical", array())), "method")));
        // line 150
        echo "\t\t\tdata-social-sharing=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter((isset($context["socialSharing"]) ? $context["socialSharing"] : null)));
        echo "\"
\t\t\t";
        // line 151
        ob_start();
        // line 152
        echo "\t\t\t\t";
        $this->displayBlock('additionalGridGalleryClass', $context, $blocks);
        // line 159
        echo "\t\t\t";
        $context["varAdditionalGalleryClass"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 160
        echo "\t\t\tclass=\"grid-gallery
\t\t\t\t";
        // line 161
        echo twig_escape_filter($this->env, (isset($context["varAdditionalGalleryClass"]) ? $context["varAdditionalGalleryClass"] : null), "html", null, true);
        echo "
\t\t\t\t";
        // line 162
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbs", array()), "enable", array()) == "1")) {
            // line 163
            echo "\t\t\t\t\tgrid-gallery-thumbs
\t\t\t\t";
        }
        // line 165
        echo "
\t\t\t\t";
        // line 166
        if ((($this->getAttribute($this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "getConfig", array(), "method"), "get", array(0 => "optimizations"), "method") == 1) && ($this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "isPro", array(), "method") == false))) {
            // line 167
            echo "\t\t\t\t\t\toptimizations
\t\t\t\t";
        }
        // line 169
        echo "
\t\t\t\t";
        // line 170
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "openByLink", array()) == "on")) {
            // line 171
            echo "\t\t\t\t    hidden-item
                ";
        }
        // line 173
        echo "
\t\t\t\t";
        // line 174
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "displayFirstPhoto", array()) == "on")) {
            // line 175
            echo "\t\t\t\t    one-photo
                ";
        }
        // line 177
        echo "                \"
\t\t\tstyle=\"
\t\t\t\twidth:";
        // line 179
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "width", array()) . twig_replace_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "width_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
        echo ";
\t\t\t\theight:";
        // line 180
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array(), "any", false, true), "height", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array(), "any", false, true), "height", array()), "auto")) : ("auto")), "html", null, true);
        echo "
\t\t\t\t\t";
        // line 181
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "height", array()) != "auto") && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "height", array()) != null))) {
            echo "px ";
        }
        echo ";
\t\t\t\t";
        // line 182
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "position", array()) == "1") || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "position", array()) == "left"))) {
            // line 183
            echo "\t\t\t\t\tfloat: left;
\t\t\t\t";
        }
        // line 185
        echo "\t\t\t\t";
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "position", array()) == "2") || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "position", array()) == "right"))) {
            // line 186
            echo "\t\t\t\t\tfloat:right;
\t\t\t\t";
        }
        // line 188
        echo "\t\t\t\t";
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "position", array()) == "center")) {
            // line 189
            echo "\t\t\t\tmargin-left:auto;
\t\t\t\tmargin-right:auto;
\t\t\t\t";
        }
        // line 192
        echo "\t\t\t";
        if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "fullscreen", array()), "enabled", array())) {
            echo "position: fixed; z-index: 9999999; top: 0; left: 0; background-color: white;";
        } else {
            echo "position:relative;";
        }
        echo "\"
\t\t";
    }

    // line 152
    public function block_additionalGridGalleryClass($context, array $blocks = array())
    {
        // line 153
        echo "\t\t\t\t\t";
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == "1")) {
            // line 154
            echo "\t\t\t\t\t\tgrid-gallery-fluid-height
\t\t\t\t\t";
        } else {
            // line 156
            echo "\t\t\t\t\t\tgrid-gallery-fixed
\t\t\t\t\t";
        }
        // line 158
        echo "\t\t\t\t";
    }

    // line 216
    public function block_photos_before($context, array $blocks = array())
    {
        // line 217
        echo "\t\t";
    }

    // line 228
    public function block_photos_attributes($context, array $blocks = array())
    {
        // line 229
        echo "\t\t\t\tid=\"photos-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()), "html", null, true);
        echo "\"
\t\t\t\tclass=\"grid-gallery-photos\"
\t\t\t";
    }

    // line 233
    public function block_photos($context, array $blocks = array())
    {
        // line 234
        echo "\t\t\t    ";
        $context["i"] = 0;
        // line 235
        echo "
\t\t\t\t";
        // line 236
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "photos", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["photo"]) {
            // line 237
            echo "\t\t\t\t\t";
            $this->loadTemplate("@galleries/shortcode/helpers.twig", "@galleries/shortcode/gallery.twig", 237)->display(array("gallery" => (isset($context["gallery"]) ? $context["gallery"] : null), "photo" => $context["photo"], "settings" => (isset($context["settings"]) ? $context["settings"] : null), "index" => (isset($context["i"]) ? $context["i"] : null)));
            // line 238
            echo "\t\t\t\t    ";
            $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
            // line 239
            echo "\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['photo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 240
        echo "\t\t\t";
    }

    // line 248
    public function block_photos_after($context, array $blocks = array())
    {
        // line 249
        echo "\t\t";
    }

    // line 114
    public function getgetSocialSharingWrapperClass($__position__ = null, $__horizontalAlign__ = null, $__verticalAlign__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "position" => $__position__,
            "horizontalAlign" => $__horizontalAlign__,
            "verticalAlign" => $__verticalAlign__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 115
            echo "                ";
            $context["class"] = ((isset($context["position"]) ? $context["position"] : null) . " ");
            // line 116
            echo "                ";
            if ((((isset($context["position"]) ? $context["position"] : null) == "top") || ((isset($context["position"]) ? $context["position"] : null) == "bottom"))) {
                // line 117
                echo "                    ";
                $context["class"] = ((isset($context["class"]) ? $context["class"] : null) . (isset($context["horizontalAlign"]) ? $context["horizontalAlign"] : null));
                // line 118
                echo "                ";
            } else {
                // line 119
                echo "                        ";
                $context["class"] = (((isset($context["class"]) ? $context["class"] : null) . "vertical ") .                 // line 120
(isset($context["verticalAlign"]) ? $context["verticalAlign"] : null));
                // line 121
                echo "                ";
            }
            // line 122
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["class"]) ? $context["class"] : null), "html", null, true);
            echo "
            ";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@galleries/shortcode/gallery.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  757 => 122,  754 => 121,  752 => 120,  750 => 119,  747 => 118,  744 => 117,  741 => 116,  738 => 115,  724 => 114,  720 => 249,  717 => 248,  713 => 240,  707 => 239,  704 => 238,  701 => 237,  697 => 236,  694 => 235,  691 => 234,  688 => 233,  680 => 229,  677 => 228,  673 => 217,  670 => 216,  666 => 158,  662 => 156,  658 => 154,  655 => 153,  652 => 152,  641 => 192,  636 => 189,  633 => 188,  629 => 186,  626 => 185,  622 => 183,  620 => 182,  614 => 181,  610 => 180,  606 => 179,  602 => 177,  598 => 175,  596 => 174,  593 => 173,  589 => 171,  587 => 170,  584 => 169,  580 => 167,  578 => 166,  575 => 165,  571 => 163,  569 => 162,  565 => 161,  562 => 160,  559 => 159,  556 => 152,  554 => 151,  549 => 150,  547 => 144,  546 => 143,  545 => 142,  544 => 141,  543 => 140,  542 => 136,  541 => 135,  540 => 134,  539 => 133,  538 => 132,  537 => 129,  536 => 128,  535 => 126,  534 => 125,  531 => 124,  528 => 113,  525 => 112,  523 => 111,  521 => 110,  518 => 109,  515 => 108,  512 => 107,  509 => 106,  507 => 105,  501 => 103,  497 => 101,  494 => 100,  488 => 98,  485 => 97,  479 => 95,  476 => 94,  471 => 92,  467 => 91,  462 => 90,  459 => 89,  455 => 88,  451 => 87,  446 => 86,  443 => 85,  439 => 84,  434 => 83,  430 => 82,  426 => 81,  422 => 80,  418 => 79,  414 => 78,  410 => 77,  406 => 76,  402 => 75,  398 => 74,  394 => 73,  388 => 71,  386 => 70,  383 => 69,  378 => 67,  375 => 66,  369 => 64,  366 => 63,  361 => 61,  358 => 60,  352 => 58,  347 => 56,  344 => 55,  340 => 53,  337 => 52,  331 => 50,  328 => 49,  324 => 47,  321 => 46,  317 => 44,  314 => 43,  309 => 41,  306 => 40,  303 => 39,  297 => 37,  293 => 35,  291 => 34,  283 => 33,  275 => 32,  271 => 31,  263 => 30,  254 => 28,  250 => 26,  248 => 25,  244 => 24,  240 => 23,  236 => 22,  232 => 21,  228 => 20,  224 => 19,  220 => 18,  213 => 17,  210 => 16,  206 => 13,  194 => 10,  184 => 9,  172 => 8,  160 => 7,  157 => 6,  154 => 5,  151 => 4,  139 => 252,  135 => 250,  133 => 248,  124 => 241,  122 => 233,  118 => 231,  116 => 228,  111 => 225,  107 => 223,  103 => 221,  100 => 220,  98 => 219,  95 => 218,  93 => 216,  90 => 215,  87 => 214,  82 => 211,  75 => 209,  71 => 208,  65 => 207,  62 => 206,  51 => 197,  48 => 196,  46 => 195,  42 => 193,  40 => 16,  36 => 14,  33 => 4,  31 => 3,  28 => 2,  26 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@galleries/shortcode/gallery.twig", "/home/sites/5b/1/1dfcd1df43/public_html/wp-content/plugins/gallery-by-supsystic/src/GridGallery/Galleries/views/shortcode/gallery.twig");
    }
}
