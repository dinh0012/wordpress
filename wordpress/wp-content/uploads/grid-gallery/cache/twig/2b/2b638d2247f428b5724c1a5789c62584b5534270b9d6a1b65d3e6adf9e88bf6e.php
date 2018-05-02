<?php

/* @galleries/shortcode/helpers.twig */
class __TwigTemplate_dbd7e20bdd100001dec6a1cc4913addb8f5c34a9530c65cb2e7834ccb989bf90 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'ggFigureWidth' => array($this, 'block_ggFigureWidth'),
            'ggMosaicHiddenItem' => array($this, 'block_ggMosaicHiddenItem'),
            'a_attributes' => array($this, 'block_a_attributes'),
            'a_attributes_class_set' => array($this, 'block_a_attributes_class_set'),
            'a_attributes_href' => array($this, 'block_a_attributes_href'),
            'figure_before' => array($this, 'block_figure_before'),
            'galleryTypeBlock' => array($this, 'block_galleryTypeBlock'),
            'figure_attributes' => array($this, 'block_figure_attributes'),
            'previewImageUrlVar' => array($this, 'block_previewImageUrlVar'),
            'imageAttributesStyleSize' => array($this, 'block_imageAttributesStyleSize'),
            'image_attributes' => array($this, 'block_image_attributes'),
            'figcaption_style' => array($this, 'block_figcaption_style'),
            'figcaption_class' => array($this, 'block_figcaption_class'),
            'figcaption_attributes' => array($this, 'block_figcaption_attributes'),
            'figcaption_wrap' => array($this, 'block_figcaption_wrap'),
            'ggImageCaptionEntry' => array($this, 'block_ggImageCaptionEntry'),
            'figcaption_after' => array($this, 'block_figcaption_after'),
            'figcaption_after_set_exif' => array($this, 'block_figcaption_after_set_exif'),
            'figure_after' => array($this, 'block_figure_after'),
            'oneGalleryImage' => array($this, 'block_oneGalleryImage'),
            'mosaicLastImageNumberWrapper' => array($this, 'block_mosaicLastImageNumberWrapper'),
            'mosaicFigcaptionWrapper' => array($this, 'block_mosaicFigcaptionWrapper'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        ob_start();
        // line 2
        echo "\t";
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "type", array()) != "none")) {
            // line 3
            echo "\t\tborder: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "width", array()), "html", null, true);
            echo "px ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "type", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "color", array()), "html", null, true);
            echo ";
\t";
        }
        // line 5
        echo "\tborder-radius: ";
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "radius", array()) . twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "radius_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
        echo ";
\t";
        // line 6
        if (($this->getAttribute(($context["settings"] ?? null), "use_shadow", array()) == 1)) {
            // line 7
            echo "\t\tbox-shadow: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "shadow", array()), "x", array()), "html", null, true);
            echo "px ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "shadow", array()), "y", array()), "html", null, true);
            echo "px ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "shadow", array()), "blur", array()), "html", null, true);
            echo "px ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "shadow", array()), "color", array()), "html", null, true);
            echo ";
\t";
        }
        // line 8
        echo ";
\tmargin: ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "distance", array()), "html", null, true);
        echo "px;";
        // line 11
        echo "\t";
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == "2")) {
            // line 12
            echo "\t\theight:";
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height", array()) . twig_replace_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
            echo ";
\t";
        }
        // line 14
        echo "\t";
        $this->displayBlock('ggFigureWidth', $context, $blocks);
        $context["figureStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 22
        echo "
";
        // line 23
        ob_start();
        // line 24
        echo "\t";
        if (($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "description", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "description", array())))) {
            // line 25
            echo "\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "description", array()), "html", null, true);
            echo "
\t";
        } else {
            // line 27
            echo "\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "title", array()), "html", null, true);
            echo "
\t";
        }
        $context["aTitle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 30
        echo "
";
        // line 31
        ob_start();
        // line 32
        echo "\t";
        if (((( !$this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "external_link", array(), "any", true, true) || twig_test_empty(twig_trim_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "external_link", array())))) && ( !$this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "video", array(), "any", true, true) || twig_test_empty(twig_trim_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array()))))) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "0"))) {
            // line 33
            echo "\t\tgg-colorbox
\t";
        }
        // line 35
        echo "
\t";
        // line 36
        if ((($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "video", array(), "any", true, true) &&  !twig_test_empty(twig_trim_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array())))) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "0"))) {
            // line 37
            echo "\t\tgg-video
\t";
        }
        // line 39
        echo "
\t";
        // line 40
        if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "2") && (( !$this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "external_link", array(), "any", true, true) || twig_test_empty(twig_trim_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "external_link", array())))) || ($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "video", array(), "any", true, true) &&  !twig_test_empty(twig_trim_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array()))))))) {
            // line 41
            echo "\t\tpbox
\t";
        }
        $context["aClass"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 44
        echo "
";
        // line 45
        ob_start();
        // line 46
        echo "\t";
        if (($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "external_link", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "external_link", array())))) {
            // line 47
            echo "\t\t";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('force_http')->getCallable(), array($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "external_link", array()))), "html", null, true);
            echo "
\t\t";
            // line 48
            $context["link"] = true;
            // line 49
            echo "\t";
        } else {
            // line 50
            echo "\t\t";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "url", array()) . "?gid=") . $this->getAttribute(($context["gallery"] ?? null), "id", array())), "html", null, true);
            echo "
\t";
        }
        $context["aHref"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 53
        echo "
";
        // line 54
        ob_start();
        // line 55
        echo "\t";
        if ((($context["link"] ?? null) && $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "rel", array(), "any", true, true))) {
            // line 56
            echo "\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "rel", array()), "html", null, true);
            echo "
\t";
        }
        // line 58
        echo "\t";
        if (((($context["link"] ?? null) == false) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "enabled", array()) == "false"))) {
            // line 59
            echo "\t\tnofollow
\t";
        }
        $context["aRel"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 62
        echo "
";
        // line 63
        ob_start();
        // line 64
        echo "
\t";
        // line 65
        ob_start();
        // line 66
        echo "\t\t";
        $this->displayBlock('ggMosaicHiddenItem', $context, $blocks);
        // line 68
        echo "\t";
        $context["ggMosaicHiddenItemVar"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 69
        echo "
\t";
        // line 71
        echo "\t";
        ob_start();
        // line 72
        echo "\t\t";
        $this->displayBlock('a_attributes', $context, $blocks);
        // line 100
        echo "\t";
        $context["var_a_attributes"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 101
        echo "
\t";
        // line 102
        ob_start();
        // line 103
        echo "\t\t";
        $this->displayBlock('figure_before', $context, $blocks);
        // line 108
        echo "\t";
        $context["var_figure_before"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 109
        echo "
\t";
        // line 110
        ob_start();
        // line 111
        echo "\t\t";
        $this->displayBlock('galleryTypeBlock', $context, $blocks);
        // line 134
        echo "\t";
        $context["galleryType"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 135
        echo "
\t";
        // line 136
        ob_start();
        // line 137
        echo "\t\t";
        $this->displayBlock('figure_attributes', $context, $blocks);
        // line 160
        echo "\t";
        $context["var_figure_attributes"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 161
        echo "
\t";
        // line 162
        list($context["width"], $context["height"], $context["crop"]) =         array(0, 0, 0);
        // line 163
        echo "
\t";
        // line 164
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width_unit", array()) == 0)) {
            // line 165
            echo "\t\t";
            $context["width"] = $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width", array());
            // line 166
            echo "\t";
        } else {
            // line 167
            echo "\t\t";
            // line 168
            echo "\t\t";
            if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "width_unit", array()) == 0)) {
                // line 169
                echo "\t\t\t";
                $context["width"] = round((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "width", array()) / 100) * $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width", array())));
                // line 170
                echo "\t\t";
            } else {
                // line 171
                echo "\t\t\t";
                $context["width"] = null;
                // line 172
                echo "\t\t";
            }
            // line 173
            echo "\t";
        }
        // line 174
        echo "
\t";
        // line 175
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height_unit", array()) == 0)) {
            // line 176
            echo "\t\t";
            $context["height"] = $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height", array());
            // line 177
            echo "\t";
        } else {
            // line 178
            echo "\t\t";
            // line 179
            echo "\t\t";
            $context["height"] = null;
            // line 180
            echo "\t\t";
            // line 181
            echo "\t\t";
            // line 182
            echo "\t\t";
            // line 183
            echo "\t\t";
            // line 184
            echo "\t\t";
            // line 185
            echo "\t";
        }
        // line 186
        echo "
\t";
        // line 187
        if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == 0) || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == 3))) {
            // line 188
            echo "\t\t";
            $context["crop"] = 1;
            // line 189
            echo "\t";
        }
        // line 190
        echo "
\t";
        // line 191
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == 1)) {
            // line 192
            echo "\t\t";
            $context["height"] = null;
            // line 193
            echo "\t";
        }
        // line 194
        echo "
\t";
        // line 195
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == 2)) {
            // line 196
            echo "\t\t";
            $context["width"] = null;
            // line 197
            echo "\t";
        }
        // line 198
        echo "
\t";
        // line 199
        ob_start();
        // line 200
        echo "\t\t";
        $this->displayBlock('previewImageUrlVar', $context, $blocks);
        // line 207
        echo "\t";
        $context["previewImgUrl"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 208
        echo "
\t";
        // line 209
        ob_start();
        // line 210
        echo "\t\t";
        $this->displayBlock('imageAttributesStyleSize', $context, $blocks);
        // line 218
        echo "\t";
        $context["imageAttributesStyleSizeVar"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 219
        echo "
\t";
        // line 220
        ob_start();
        // line 221
        echo "\t\t";
        $this->displayBlock('image_attributes', $context, $blocks);
        // line 240
        echo "\t";
        $context["var_image_attributes"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 241
        echo "
\t";
        // line 242
        ob_start();
        // line 243
        echo "\t\t";
        $this->displayBlock('figcaption_style', $context, $blocks);
        // line 266
        echo "\t";
        $context["figcaptionStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 267
        echo "
\t";
        // line 268
        ob_start();
        // line 269
        echo "\t\tclass=\"";
        $this->displayBlock('figcaption_class', $context, $blocks);
        echo "\"
\t\t";
        // line 270
        $this->displayBlock('figcaption_attributes', $context, $blocks);
        // line 277
        echo "\t";
        $context["var_figcaption_attributes"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 278
        echo "
\t";
        // line 279
        $context["prepareImgUrl"] = (($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "url", array()) . "?gid=") . $this->getAttribute(($context["gallery"] ?? null), "id", array()));
        // line 280
        echo "
\t";
        // line 281
        ob_start();
        // line 282
        echo "\t\t";
        $this->displayBlock('figcaption_wrap', $context, $blocks);
        // line 358
        echo "\t";
        $context["var_figcaption_wrap"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 359
        echo "
\t";
        // line 360
        ob_start();
        // line 361
        echo "\t\t";
        $this->displayBlock('figcaption_after', $context, $blocks);
        // line 401
        echo "\t";
        $context["var_figcaption_after"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 402
        echo "
\t";
        // line 403
        ob_start();
        // line 404
        echo "\t\t";
        $this->displayBlock('figure_after', $context, $blocks);
        // line 409
        echo "\t";
        $context["var_figure_after"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 410
        echo "
\t";
        // line 412
        echo "\t";
        $this->displayBlock('oneGalleryImage', $context, $blocks);
        // line 446
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 14
    public function block_ggFigureWidth($context, array $blocks = array())
    {
        // line 15
        echo "\t\t";
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == "2")) {
            // line 16
            echo "\t\t\twidth:auto;
\t\t";
        } else {
            // line 18
            echo "\t\t\twidth:";
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width", array()) . twig_replace_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
            echo ";
\t\t";
        }
        // line 20
        echo "\t";
    }

    // line 66
    public function block_ggMosaicHiddenItem($context, array $blocks = array())
    {
        // line 67
        echo "\t\t";
    }

    // line 72
    public function block_a_attributes($context, array $blocks = array())
    {
        // line 73
        echo "
\t\t\tid=\"gg-";
        // line 74
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "id", array()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["photo"] ?? null), "id", array()), "html", null, true);
        echo "\"

\t\t\t";
        // line 76
        $this->displayBlock('a_attributes_class_set', $context, $blocks);
        // line 79
        echo "
\t\t\t";
        // line 80
        echo twig_escape_filter($this->env, ($context["ggMosaicHiddenItemVar"] ?? null), "html", null, true);
        echo "
\t\t\t";
        // line 81
        $this->displayBlock('a_attributes_href', $context, $blocks);
        // line 85
        echo "\t\t\ttitle=\"";
        echo twig_escape_filter($this->env, twig_trim_filter(($context["aTitle"] ?? null)), "html", null, true);
        echo "\"

\t\t\t";
        // line 88
        echo "\t\t\t";
        if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "1") && (($context["link"] ?? null) == false))) {
            // line 89
            echo "\t\t\t\tdata-rel=\"prettyPhoto[pp_gal]\"
\t\t\t";
        } elseif (($this->getAttribute($this->getAttribute(        // line 90
($context["photo"] ?? null), "attachment", array()), "video", array()) == null)) {
            // line 91
            echo "\t\t\t\trel=\"";
            echo twig_escape_filter($this->env, ($context["aRel"] ?? null), "html", null, true);
            echo "\"
\t\t\t";
        }
        // line 93
        echo "\t\t\t";
        // line 94
        echo "
\t\t\t";
        // line 95
        if ((($context["link"] ?? null) == true)) {
            // line 96
            echo "\t\t\t\tdata-type=\"link\"
\t\t\t";
        }
        // line 98
        echo "\t\t\tstyle=\"border-radius: ";
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "radius", array()) . twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "radius_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
        echo ";\"
\t\t";
    }

    // line 76
    public function block_a_attributes_class_set($context, array $blocks = array())
    {
        // line 77
        echo "\t\t\t\tclass=\"gg-link ";
        echo twig_escape_filter($this->env, twig_trim_filter(($context["aClass"] ?? null)), "html", null, true);
        echo " ";
        if ((($this->getAttribute(($context["settings"] ?? null), "displayFirstPhoto", array()) == "on") && (($context["index"] ?? null) > 0))) {
            echo " hidden-item ";
        }
        echo "\"
\t\t\t";
    }

    // line 81
    public function block_a_attributes_href($context, array $blocks = array())
    {
        // line 82
        echo "\t\t\t\thref=\"";
        echo twig_escape_filter($this->env, htmlspecialchars_decode(twig_trim_filter(($context["aHref"] ?? null))), "html", null, true);
        echo "\"
\t\t\t\ttarget=\"";
        // line 83
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "target", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "target", array()), "_self")) : ("_self")), "html", null, true);
        echo "\"
\t\t\t";
    }

    // line 103
    public function block_figure_before($context, array $blocks = array())
    {
        // line 104
        echo "\t\t\t";
        if (( !$this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "false"))) {
            // line 105
            echo "\t\t\t\t<a ";
            echo twig_escape_filter($this->env, ($context["var_a_attributes"] ?? null), "html", null, true);
            echo " >
\t\t\t";
        }
        // line 107
        echo "\t\t";
    }

    // line 111
    public function block_galleryTypeBlock($context, array $blocks = array())
    {
        // line 112
        echo "\t\t\t";
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "false")) {
            // line 113
            echo "\t\t\t\t";
            if (($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "true"))) {
                // line 114
                echo "\t\t\t\t\ticons
\t\t\t\t";
            } else {
                // line 116
                echo "\t\t\t\t\tnone
\t\t\t\t";
            }
            // line 118
            echo "\t\t\t";
        } else {
            // line 119
            echo "\t\t\t\t";
            if (($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "true"))) {
                // line 120
                echo "\t\t\t\t\t";
                if ((($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "personal", array()) == "true") && twig_in_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "captionEffect", array()), array(0 => "icons", 1 => "icons-scale", 2 => "icons-sodium-left", 3 => "icons-sodium-top", 4 => "icons-nitrogen-top")))) {
                    // line 121
                    echo "\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "captionEffect", array()), "html", null, true);
                    echo "
\t\t\t\t\t";
                } else {
                    // line 123
                    echo "\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()), "html", null, true);
                    echo "
\t\t\t\t\t";
                }
                // line 125
                echo "\t\t\t\t";
            } else {
                // line 126
                echo "\t\t\t\t\t";
                if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "personal", array()) == "true")) {
                    // line 127
                    echo "\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "captionEffect", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "captionEffect", array()), $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()))) : ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()))), "html", null, true);
                    echo "
\t\t\t\t\t";
                } else {
                    // line 129
                    echo "\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()), "html", null, true);
                    echo "
\t\t\t\t\t";
                }
                // line 131
                echo "\t\t\t\t";
            }
            // line 132
            echo "\t\t\t";
        }
        // line 133
        echo "\t\t";
    }

    // line 137
    public function block_figure_attributes($context, array $blocks = array())
    {
        // line 138
        echo "\t\t\tclass=\"grid-gallery-caption
\t\t\t";
        // line 139
        if ((($this->getAttribute(($context["settings"] ?? null), "displayFirstPhoto", array()) == "on") && (($context["index"] ?? null) > 0))) {
            echo " hidden-item ";
        }
        // line 140
        echo "\t\t\t";
        echo twig_escape_filter($this->env, ($context["ggMosaicHiddenItemVar"] ?? null), "html", null, true);
        echo "
\t\t\t";
        // line 141
        if ((($this->getAttribute(($context["settings"] ?? null), "mouse_shadow", array()) == "1") && ($this->getAttribute(($context["settings"] ?? null), "use_shadow", array()) == "1"))) {
            // line 142
            echo "\t\t\t\tshadow-show
\t\t\t";
        }
        // line 144
        echo "\t\t\t";
        if ((($this->getAttribute(($context["settings"] ?? null), "mouse_shadow", array()) == "2") && ($this->getAttribute(($context["settings"] ?? null), "use_shadow", array()) == "1"))) {
            // line 145
            echo "\t\t\t\tshadow-hide
\t\t\t";
        }
        // line 146
        echo "\"
\t\t\tdata-grid-gallery-type=\"";
        // line 147
        echo twig_escape_filter($this->env, twig_trim_filter(($context["galleryType"] ?? null)), "html", null, true);
        echo "\"
\t\t\tdata-index=\"";
        // line 148
        echo twig_escape_filter($this->env, ($context["index"] ?? null), "html", null, true);
        echo "\"
\t\t\tstyle=\"display:none;";
        // line 149
        echo twig_escape_filter($this->env, twig_trim_filter(($context["figureStyle"] ?? null)), "html", null, true);
        echo "\"
\t\t\t\t";
        // line 150
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "true")) {
            // line 151
            echo "\t\t\t\t\t";
            ob_start();
            // line 152
            echo "\t\t\t\t\t\t";
            if (twig_in_filter("icons", $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()))) {
                // line 153
                echo "\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()), "html", null, true);
                echo "
\t\t\t\t\t\t";
            } else {
                // line 155
                echo "\t\t\t\t\t\t\ticons
\t\t\t\t\t\t";
            }
            // line 157
            echo "\t\t\t\t\t";
            $context["galleryType"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 158
            echo "\t\t\t\t";
        }
        // line 159
        echo "\t\t";
    }

    // line 200
    public function block_previewImageUrlVar($context, array $blocks = array())
    {
        // line 201
        echo "\t\t\t";
        if (($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "isNotRealAttachment", array()) == 1)) {
            // line 202
            echo "\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "url", array()), "html", null, true);
            echo "
\t\t\t";
        } else {
            // line 204
            echo "\t\t\t\t";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('get_attachment')->getCallable(), array($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "id", array()), ($context["width"] ?? null), ($context["height"] ?? null), $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "cropPosition", array()), (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "cropQuality", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "cropQuality", array()), "100")) : ("100")))), "html", null, true);
            echo "
\t\t\t";
        }
        // line 206
        echo "\t\t";
    }

    // line 210
    public function block_imageAttributesStyleSize($context, array $blocks = array())
    {
        // line 211
        echo "\t\t\t";
        if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width_unit", array()) == 0) &&  !twig_test_empty($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width", array())))) {
            // line 212
            echo "\t\t\t\twidth:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width", array()), "html", null, true);
            echo "px;
\t\t\t";
        }
        // line 214
        echo "\t\t\t";
        if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height_unit", array()) == 0) &&  !twig_test_empty($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height", array())))) {
            // line 215
            echo "\t\t\t\theight:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height", array()), "html", null, true);
            echo "px;
\t\t\t";
        }
        // line 217
        echo "\t\t";
    }

    // line 221
    public function block_image_attributes($context, array $blocks = array())
    {
        // line 222
        echo "\t\t\t";
        $context["imgSrcStr"] = twig_replace_filter(twig_trim_filter(($context["previewImgUrl"] ?? null)), "/%20\$/", "");
        // line 223
        echo "\t\t\t";
        $context["imgClassStr"] = "ggImg";
        // line 224
        echo "\t\t\t";
        if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "lazyload", array()), "enabled", array()) == "1") && ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "imageOnHoverEnable", array()) != "1"))) {
            // line 225
            echo "\t\t\t\tdata-gg-real-image-href=\"";
            echo twig_escape_filter($this->env, ($context["imgSrcStr"] ?? null), "html", null, true);
            echo "\"
\t\t\t\t";
            // line 226
            if (twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "lazyload", array()), "defaultImgUrl", array()))) {
                // line 227
                echo "\t\t\t\t\t";
                $context["imgSrcStr"] = $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "lazyload", array()), "defaultImgUrl", array());
                // line 228
                echo "\t\t\t\t";
            }
            // line 229
            echo "\t\t\t\t";
            $context["imgClassStr"] = (($context["imgClassStr"] ?? null) . " ggLazyImg");
            // line 230
            echo "\t\t\t";
        }
        // line 231
        echo "\t\t\tsrc=\"";
        echo twig_escape_filter($this->env, ($context["imgSrcStr"] ?? null), "html", null, true);
        echo "\"
\t\t\tclass=\"";
        // line 232
        echo twig_escape_filter($this->env, ($context["imgClassStr"] ?? null), "html", null, true);
        echo "\"
\t\t\talt=\"";
        // line 233
        if ((twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "alt", array())) || ($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "alt", array()) == " "))) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "title", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "alt", array()), "html", null, true);
        }
        echo "\"
\t\t\ttitle=\"";
        // line 234
        if ( !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "description", array()))) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "description", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "title", array()), "html", null, true);
        }
        echo "\"
\t\t\tdata-description=\"";
        // line 235
        if ( !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "description", array()))) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "description", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "title", array()), "html", null, true);
        }
        echo "\"
\t\t\tdata-caption=\"";
        // line 236
        if ( !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "caption", array()))) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "caption", array()));
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "title", array()));
        }
        echo "\"
\t\t\tdata-title=\"";
        // line 237
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "title", array()), "html", null, true);
        echo "\"
\t\t\tstyle=\"";
        // line 238
        echo twig_escape_filter($this->env, ($context["imageAttributesStyleSizeVar"] ?? null), "html", null, true);
        echo "\"
\t\t";
    }

    // line 243
    public function block_figcaption_style($context, array $blocks = array())
    {
        // line 244
        echo "\t\t\t";
        if (($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "true"))) {
            // line 245
            echo "\t\t\t\tfont-family:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "font_family", array()), "html", null, true);
            echo ";
\t\t\t\t";
            // line 246
            if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "overlay_enabled", array()) == "true")) {
                // line 247
                echo "\t\t\t\t\tbackground-color:";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "overlay_color", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "overlay_color", array()), "#3498db")) : ("#3498db")), "html", null, true);
                echo ";
\t\t\t\t\theight : 100%;
\t\t\t\t\t";
                // line 250
                echo "\t\t\t\t";
            } else {
                // line 251
                echo "\t\t\t\t\theight : 100%;
\t\t\t\t\tbackground-color: transparent;
\t\t\t\t";
            }
            // line 254
            echo "\t\t\t";
        } else {
            // line 255
            echo "\t\t\t\tcolor:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "foreground", array()), "html", null, true);
            echo ";
\t\t\t\tbackground-color:";
            // line 256
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "background", array()), "html", null, true);
            echo ";
\t\t\t\tfont-size:";
            // line 257
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
            echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
            echo ";
\t\t\t\ttext-align:";
            // line 258
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_align", array()), "html", null, true);
            echo ";
\t\t\t\tfont-family:";
            // line 259
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "font_family", array()), "html", null, true);
            echo ";
\t\t\t\t";
            // line 260
            if ((($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()) == "none") || ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "false"))) {
                // line 261
                echo "\t\t\t\t\topacity:1;
\t\t\t\t\tbottom:0;
\t\t\t\t";
            }
            // line 264
            echo "\t\t\t";
        }
        // line 265
        echo "\t\t";
    }

    // line 269
    public function block_figcaption_class($context, array $blocks = array())
    {
    }

    // line 270
    public function block_figcaption_attributes($context, array $blocks = array())
    {
        // line 271
        echo "\t\t\t";
        if (($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "true"))) {
            // line 272
            echo "\t\t\t\tdata-alpha=\"";
            echo twig_escape_filter($this->env, twig_trim_filter((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "overlay_transparency", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "overlay_transparency", array()), 5)) : (5))), "html", null, true);
            echo "\"
\t\t\t";
        }
        // line 274
        echo "\t\t\tdata-alpha=\"";
        echo twig_escape_filter($this->env, twig_trim_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "transparency", array())), "html", null, true);
        echo "\"
\t\t\tstyle=\"";
        // line 275
        echo twig_escape_filter($this->env, twig_trim_filter(($context["figcaptionStyle"] ?? null)), "html", null, true);
        echo "\"
\t\t";
    }

    // line 282
    public function block_figcaption_wrap($context, array $blocks = array())
    {
        // line 283
        echo "\t\t\t";
        // line 284
        echo "\t\t\t";
        if (($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "true"))) {
            // line 285
            echo "\t\t\t\t<div
\t\t\t\t\t\tclass=\"hi-icon-wrap ";
            // line 286
            echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "effect", array()), 0, (($context["length"] ?? null) - 1)), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "effect", array()), "html", null, true);
            echo "\"
\t\t\t\t\t\tdata-margin=\"";
            // line 287
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "margin", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "margin", array()), 5)) : (5)), "html", null, true);
            echo "\"
\t\t\t\t>
\t\t\t\t\t";
            // line 289
            if (($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "video", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array())))) {
                // line 290
                echo "
\t\t\t\t\t\t";
                // line 291
                ob_start();
                // line 292
                echo "\t\t\t\t\t\t\t";
                if (twig_in_filter("youtu", $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array()))) {
                    // line 293
                    echo "\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array()), ($context["youtube"] ?? null)), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 294
                    $context["videoSource"] = "youtube";
                    // line 295
                    echo "\t\t\t\t\t\t\t";
                } elseif (twig_in_filter("vimeo.com", $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array()))) {
                    // line 296
                    echo "\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, (call_user_func_array($this->env->getFilter('preg_replace')->getCallable(), array($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array()), ($context["vimeoPattern"] ?? null), ($context["vimeoReplace"] ?? null))) . "?api=1"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 297
                    $context["videoSource"] = "vimeo";
                    // line 298
                    echo "\t\t\t\t\t\t\t";
                } else {
                    // line 299
                    echo "\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, twig_trim_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array())), "html", null, true);
                    echo "
\t\t\t\t\t\t\t";
                }
                // line 301
                echo "\t\t\t\t\t\t";
                $context["videoUrl"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 302
                echo "
\t\t\t\t\t\t";
                // line 303
                $context["videoIcon"] = ((twig_in_filter("youtu", $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array()))) ? ("icon-youtube") : ("icon-vimeo"));
                // line 304
                echo "
\t\t\t\t\t\t";
                // line 305
                ob_start();
                // line 306
                echo "\t\t\t\t\t\t\tmargin-left:";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "margin", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "margin", array()), 5)) : (5)), "html", null, true);
                echo ";
\t\t\t\t\t\t\tmargin-right:";
                // line 307
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "margin", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "margin", array()), 5)) : (5)), "html", null, true);
                echo ";
\t\t\t\t\t\t";
                $context["iconStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 309
                echo "
\t\t\t\t\t\t<a href=\"";
                // line 310
                echo twig_escape_filter($this->env, twig_trim_filter(($context["videoUrl"] ?? null)), "html", null, true);
                echo "\"
\t\t\t\t\t\t   data-id=\"gg-";
                // line 311
                echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "id", array()), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["photo"] ?? null), "id", array()), "html", null, true);
                echo "\"
\t\t\t\t\t\t   title=\"";
                // line 312
                echo twig_escape_filter($this->env, twig_trim_filter(($context["aTitle"] ?? null)), "html", null, true);
                echo "\"
\t\t\t\t\t\t   class=\"hi-icon gg-video ";
                // line 313
                echo twig_escape_filter($this->env, ($context["videoIcon"] ?? null), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t";
                // line 314
                if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "2")) {
                    echo " pbox";
                }
                // line 315
                echo "\t\t\t\t\t\t\t\t\t\t\"
\t\t\t\t\t\t   style=\"";
                // line 316
                echo twig_escape_filter($this->env, twig_trim_filter(($context["iconStyle"] ?? null)), "html", null, true);
                echo "\"
\t\t\t\t\t\t   data-video-source=\"";
                // line 317
                echo twig_escape_filter($this->env, ($context["videoSource"] ?? null), "html", null, true);
                echo "\"
\t\t\t\t\t\t\t\t";
                // line 319
                echo "\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "1")) {
                    // line 320
                    echo "\t\t\t\t\t\t\t\t\tdata-rel=\"prettyPhoto[pp_gal]\"
\t\t\t\t\t\t\t\t";
                } else {
                    // line 322
                    echo "\t\t\t\t\t\t\t\t\t";
                    // line 323
                    echo "\t\t\t\t\t\t\t\t\trel=\"video\"
\t\t\t\t\t\t\t\t\t";
                    // line 325
                    echo "\t\t\t\t\t\t\t\t";
                }
                // line 326
                echo "\t\t\t\t\t\t>
\t\t\t\t\t\t\t";
                // line 328
                echo "\t\t\t\t\t\t</a>
\t\t\t\t\t";
            }
            // line 330
            echo "
\t\t\t\t\t";
            // line 331
            if (($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "external_link", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "external_link", array())))) {
                // line 332
                echo "\t\t\t\t\t\t<a title=\"";
                echo twig_escape_filter($this->env, twig_trim_filter(($context["aTitle"] ?? null)), "html", null, true);
                echo "\" data-id=\"gg-";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "id", array()), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["photo"] ?? null), "id", array()), "html", null, true);
                echo "\" href=\"";
                if (($this->getAttribute(($context["settings"] ?? null), "openByLink", array()) == "on")) {
                    echo " ";
                    echo twig_escape_filter($this->env, ($context["prepareImgUrl"] ?? null), "html", null, true);
                    echo " ";
                } else {
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "external_link", array()), "html", null, true);
                    echo " ";
                }
                echo " \" target=\"";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "target", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "target", array()), "_self")) : ("_self")), "html", null, true);
                echo "\" class=\"hi-icon icon-link ";
                if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "2") && ($this->getAttribute(($context["settings"] ?? null), "openByLink", array()) == "on"))) {
                    echo "pbox";
                }
                echo "\" style=\"";
                echo twig_escape_filter($this->env, twig_trim_filter(($context["iconStyle"] ?? null)), "html", null, true);
                echo "\"></a>
\t\t\t\t\t";
            }
            // line 334
            echo "
\t\t\t\t\t";
            // line 335
            if (( !array_key_exists("videoUrl", $context) && ( !$this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "external_link", array(), "any", true, true) || twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "external_link", array()))))) {
                // line 336
                echo "\t\t\t\t\t\t<a title=\"";
                echo twig_escape_filter($this->env, twig_trim_filter(($context["aTitle"] ?? null)), "html", null, true);
                echo "\" data-id=\"gg-";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "id", array()), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["photo"] ?? null), "id", array()), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, ($context["prepareImgUrl"] ?? null), "html", null, true);
                echo "\" class=\"hi-icon icon-fullscreen gg-colorbox";
                if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "2") &&  !array_key_exists("link", $context))) {
                    echo " pbox";
                }
                echo "\" style=\"";
                echo twig_escape_filter($this->env, twig_trim_filter(($context["iconStyle"] ?? null)), "html", null, true);
                echo "\"
\t\t\t\t\t\t\t\t";
                // line 337
                if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "1") && (($context["link"] ?? null) == false))) {
                    // line 338
                    echo "\t\t\t\t\t\t\tdata-rel=\"prettyPhoto[pp_gal]\"
\t\t\t\t\t\t\t\t";
                }
                // line 339
                echo ">Open in pop-up window</a>
\t\t\t\t\t";
            }
            // line 341
            echo "\t\t\t\t</div>
\t\t\t";
        }
        // line 343
        echo "
\t\t\t";
        // line 344
        if (( !$this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "false"))) {
            // line 345
            echo "\t\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "true")) {
                // line 346
                echo "\t\t\t\t\t";
                $this->displayBlock('ggImageCaptionEntry', $context, $blocks);
                // line 355
                echo "\t\t\t\t";
            }
            // line 356
            echo "\t\t\t";
        }
        // line 357
        echo "\t\t";
    }

    // line 346
    public function block_ggImageCaptionEntry($context, array $blocks = array())
    {
        // line 347
        echo "\t\t\t\t\t\t";
        if ( !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "caption", array()))) {
            // line 348
            echo "\t\t\t\t\t\t\t<div class=\"gg-image-caption fitvidsignore ";
            if (($this->getAttribute(($context["settings"] ?? null), "rtl", array()) == true)) {
                echo "ggRtlClass";
            }
            echo "\" ";
            if (($this->getAttribute(($context["settings"] ?? null), "rtl", array()) == true)) {
                echo "dir=\"rtl\"";
            }
            echo " style=\"font-size:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
            echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
            echo ";\">
\t\t\t\t\t\t\t\t<object type=\"none/none\">
\t\t\t\t\t\t\t\t\t";
            // line 350
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "caption", array()), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t</object>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        }
        // line 354
        echo "\t\t\t\t\t";
    }

    // line 361
    public function block_figcaption_after($context, array $blocks = array())
    {
        // line 362
        echo "\t\t\t";
        if ((($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "true")) && ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "true"))) {
            // line 363
            echo "
\t\t\t\t";
            // line 364
            ob_start();
            // line 365
            echo "\t\t\t\t\tcolor:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "foreground", array()), "html", null, true);
            echo ";
\t\t\t\t\tbackground-color:";
            // line 366
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "background", array()), "html", null, true);
            echo ";
\t\t\t\t\tfont-size:";
            // line 367
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
            echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
            echo ";
\t\t\t\t\tfont-family:";
            // line 368
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "font_family", array()), "html", null, true);
            echo ";
\t\t\t\t\t";
            // line 369
            if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_align", array()) != 3)) {
                // line 370
                echo "\t\t\t\t\t\ttext-align:";
                echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_align", array()), array(0 => "left", 1 => "right", 2 => "center")), "html", null, true);
                echo ";
\t\t\t\t\t";
            }
            // line 372
            echo "\t\t\t\t\t";
            if ((($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()) == "none") || ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "false"))) {
                // line 373
                echo "\t\t\t\t\t\topacity:1;
\t\t\t\t\t\tbottom:0;
\t\t\t\t\t";
            }
            // line 376
            echo "\t\t\t\t\tvertical-align:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "position", array()), "html", null, true);
            echo ";
\t\t\t\t";
            $context["captionStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 378
            echo "
\t\t\t\t";
            // line 379
            if (( !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "caption", array())) || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "tooltip", array()) == "false"))) {
                // line 380
                echo "\t\t\t\t\t<div
\t\t\t\t\t\t\tclass=\"caption-with-";
                // line 381
                if (twig_in_filter("icons", $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()))) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()), "html", null, true);
                } else {
                    echo "icons";
                }
                echo "\"
\t\t\t\t\t\t\tstyle=\"";
                // line 382
                echo twig_escape_filter($this->env, ($context["captionStyle"] ?? null), "html", null, true);
                echo "\"
\t\t\t\t\t\t\tdata-alpha=\"";
                // line 383
                echo twig_escape_filter($this->env, twig_trim_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "transparency", array())), "html", null, true);
                echo "\">
\t\t\t\t\t\t<div style=\"display: table; height:100%; width:100%;\">
\t\t\t\t\t\t\t";
                // line 385
                $context["ggCaptionText"] = $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "title", array());
                // line 386
                echo "\t\t\t\t\t\t\t";
                $context["ggCaptionTextStyle"] = ((((("padding: 10px;display:table-cell;font-size:" . $this->getAttribute($this->getAttribute($this->getAttribute(                // line 387
($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size", array())) . twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em"))) . ";vertical-align:") . $this->getAttribute($this->getAttribute($this->getAttribute(                // line 388
($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "position", array())) . ";");
                // line 389
                echo "\t\t\t\t\t\t\t";
                if ( !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "caption", array()))) {
                    // line 390
                    echo "\t\t\t\t\t\t\t\t";
                    $context["ggCaptionText"] = $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "caption", array());
                    // line 391
                    echo "\t\t\t\t\t\t\t\t";
                    $context["ggCaptionTextStyle"] = (($context["ggCaptionTextStyle"] ?? null) . "font-weight: 800;");
                    // line 392
                    echo "\t\t\t\t\t\t\t";
                }
                // line 393
                echo "\t\t\t\t\t\t\t";
                $this->displayBlock('figcaption_after_set_exif', $context, $blocks);
                // line 396
                echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 399
            echo "\t\t\t";
        }
        // line 400
        echo "\t\t";
    }

    // line 393
    public function block_figcaption_after_set_exif($context, array $blocks = array())
    {
        // line 394
        echo "\t\t\t\t\t\t\t\t<span style=\"";
        echo twig_escape_filter($this->env, ($context["ggCaptionTextStyle"] ?? null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, ($context["ggCaptionText"] ?? null), "html", null, true);
        echo "</span>
\t\t\t\t\t\t\t";
    }

    // line 404
    public function block_figure_after($context, array $blocks = array())
    {
        // line 405
        echo "\t\t\t";
        if (( !$this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "false"))) {
            // line 406
            echo "\t\t\t\t</a>
\t\t\t";
        }
        // line 408
        echo "\t\t";
    }

    // line 412
    public function block_oneGalleryImage($context, array $blocks = array())
    {
        // line 413
        echo "\t\t";
        echo twig_escape_filter($this->env, ($context["var_figure_before"] ?? null), "html", null, true);
        echo "
\t\t<FIGURE ";
        // line 414
        echo twig_escape_filter($this->env, ($context["var_figure_attributes"] ?? null), "html", null, true);
        echo " >
\t\t\t<div class=\"crop
\t\t\t\t";
        // line 416
        if ((($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "shadow", array()), "overlay", array()) == "1") && ($this->getAttribute(($context["settings"] ?? null), "use_shadow", array()) == "1"))) {
            // line 417
            echo "\t\t\t\t\timage-overlay
\t\t\t\t";
        }
        // line 418
        echo "\"
\t\t\t\t style=\"
\t\t\t\t ";
        // line 420
        if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == "0") || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == "3"))) {
            // line 421
            echo "\t\t\t\t\t\t width:";
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width", array()) . twig_replace_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
            echo ";
\t\t\t\t\t\t height:";
            // line 422
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height", array()) . twig_replace_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
            echo ";
\t\t\t\t\t\t overflow:hidden;
\t\t\t\t ";
        }
        // line 424
        echo "\">

\t\t\t\t<img ";
        // line 426
        echo twig_escape_filter($this->env, ($context["var_image_attributes"] ?? null), "html", null, true);
        echo " />
\t\t\t</div>
\t\t\t";
        // line 428
        $this->displayBlock('mosaicLastImageNumberWrapper', $context, $blocks);
        // line 430
        echo "\t\t\t";
        $this->displayBlock('mosaicFigcaptionWrapper', $context, $blocks);
        // line 443
        echo "\t\t</FIGURE>
\t\t";
        // line 444
        echo twig_escape_filter($this->env, ($context["var_figure_after"] ?? null), "html", null, true);
        echo "
\t";
    }

    // line 428
    public function block_mosaicLastImageNumberWrapper($context, array $blocks = array())
    {
        // line 429
        echo "\t\t\t";
    }

    // line 430
    public function block_mosaicFigcaptionWrapper($context, array $blocks = array())
    {
        // line 431
        echo "\t\t\t\t<FIGCAPTION ";
        echo twig_escape_filter($this->env, ($context["var_figcaption_attributes"] ?? null), "html", null, true);
        echo "\t>
\t\t\t\t\t<div
\t\t\t\t\t\t\tclass=\"grid-gallery-figcaption-wrap\"
\t\t\t\t\t\t\tstyle=\"
\t\t\t\t\t\t\t";
        // line 435
        if (( !$this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "false"))) {
            // line 436
            echo "\t\t\t\t\t\t\t\t\tvertical-align:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "position", array()), "html", null, true);
            echo ";
\t\t\t\t\t\t\t";
        }
        // line 437
        echo "\">
\t\t\t\t\t\t";
        // line 438
        echo twig_escape_filter($this->env, ($context["var_figcaption_wrap"] ?? null), "html", null, true);
        echo "
\t\t\t\t\t</div>
\t\t\t\t</FIGCAPTION>
\t\t\t\t";
        // line 441
        echo twig_escape_filter($this->env, ($context["var_figcaption_after"] ?? null), "html", null, true);
        echo "
\t\t\t";
    }

    public function getTemplateName()
    {
        return "@galleries/shortcode/helpers.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1444 => 441,  1438 => 438,  1435 => 437,  1429 => 436,  1427 => 435,  1419 => 431,  1416 => 430,  1412 => 429,  1409 => 428,  1403 => 444,  1400 => 443,  1397 => 430,  1395 => 428,  1390 => 426,  1386 => 424,  1380 => 422,  1375 => 421,  1373 => 420,  1369 => 418,  1365 => 417,  1363 => 416,  1358 => 414,  1353 => 413,  1350 => 412,  1346 => 408,  1342 => 406,  1339 => 405,  1336 => 404,  1327 => 394,  1324 => 393,  1320 => 400,  1317 => 399,  1312 => 396,  1309 => 393,  1306 => 392,  1303 => 391,  1300 => 390,  1297 => 389,  1295 => 388,  1294 => 387,  1292 => 386,  1290 => 385,  1285 => 383,  1281 => 382,  1273 => 381,  1270 => 380,  1268 => 379,  1265 => 378,  1259 => 376,  1254 => 373,  1251 => 372,  1245 => 370,  1243 => 369,  1239 => 368,  1234 => 367,  1230 => 366,  1225 => 365,  1223 => 364,  1220 => 363,  1217 => 362,  1214 => 361,  1210 => 354,  1203 => 350,  1188 => 348,  1185 => 347,  1182 => 346,  1178 => 357,  1175 => 356,  1172 => 355,  1169 => 346,  1166 => 345,  1164 => 344,  1161 => 343,  1157 => 341,  1153 => 339,  1149 => 338,  1147 => 337,  1130 => 336,  1128 => 335,  1125 => 334,  1097 => 332,  1095 => 331,  1092 => 330,  1088 => 328,  1085 => 326,  1082 => 325,  1079 => 323,  1077 => 322,  1073 => 320,  1070 => 319,  1066 => 317,  1062 => 316,  1059 => 315,  1055 => 314,  1051 => 313,  1047 => 312,  1041 => 311,  1037 => 310,  1034 => 309,  1029 => 307,  1024 => 306,  1022 => 305,  1019 => 304,  1017 => 303,  1014 => 302,  1011 => 301,  1005 => 299,  1002 => 298,  1000 => 297,  995 => 296,  992 => 295,  990 => 294,  985 => 293,  982 => 292,  980 => 291,  977 => 290,  975 => 289,  970 => 287,  964 => 286,  961 => 285,  958 => 284,  956 => 283,  953 => 282,  947 => 275,  942 => 274,  936 => 272,  933 => 271,  930 => 270,  925 => 269,  921 => 265,  918 => 264,  913 => 261,  911 => 260,  907 => 259,  903 => 258,  898 => 257,  894 => 256,  889 => 255,  886 => 254,  881 => 251,  878 => 250,  872 => 247,  870 => 246,  865 => 245,  862 => 244,  859 => 243,  853 => 238,  849 => 237,  841 => 236,  833 => 235,  825 => 234,  817 => 233,  813 => 232,  808 => 231,  805 => 230,  802 => 229,  799 => 228,  796 => 227,  794 => 226,  789 => 225,  786 => 224,  783 => 223,  780 => 222,  777 => 221,  773 => 217,  767 => 215,  764 => 214,  758 => 212,  755 => 211,  752 => 210,  748 => 206,  742 => 204,  736 => 202,  733 => 201,  730 => 200,  726 => 159,  723 => 158,  720 => 157,  716 => 155,  710 => 153,  707 => 152,  704 => 151,  702 => 150,  698 => 149,  694 => 148,  690 => 147,  687 => 146,  683 => 145,  680 => 144,  676 => 142,  674 => 141,  669 => 140,  665 => 139,  662 => 138,  659 => 137,  655 => 133,  652 => 132,  649 => 131,  643 => 129,  637 => 127,  634 => 126,  631 => 125,  625 => 123,  619 => 121,  616 => 120,  613 => 119,  610 => 118,  606 => 116,  602 => 114,  599 => 113,  596 => 112,  593 => 111,  589 => 107,  583 => 105,  580 => 104,  577 => 103,  571 => 83,  566 => 82,  563 => 81,  552 => 77,  549 => 76,  542 => 98,  538 => 96,  536 => 95,  533 => 94,  531 => 93,  525 => 91,  523 => 90,  520 => 89,  517 => 88,  511 => 85,  509 => 81,  505 => 80,  502 => 79,  500 => 76,  493 => 74,  490 => 73,  487 => 72,  483 => 67,  480 => 66,  476 => 20,  470 => 18,  466 => 16,  463 => 15,  460 => 14,  455 => 446,  452 => 412,  449 => 410,  446 => 409,  443 => 404,  441 => 403,  438 => 402,  435 => 401,  432 => 361,  430 => 360,  427 => 359,  424 => 358,  421 => 282,  419 => 281,  416 => 280,  414 => 279,  411 => 278,  408 => 277,  406 => 270,  401 => 269,  399 => 268,  396 => 267,  393 => 266,  390 => 243,  388 => 242,  385 => 241,  382 => 240,  379 => 221,  377 => 220,  374 => 219,  371 => 218,  368 => 210,  366 => 209,  363 => 208,  360 => 207,  357 => 200,  355 => 199,  352 => 198,  349 => 197,  346 => 196,  344 => 195,  341 => 194,  338 => 193,  335 => 192,  333 => 191,  330 => 190,  327 => 189,  324 => 188,  322 => 187,  319 => 186,  316 => 185,  314 => 184,  312 => 183,  310 => 182,  308 => 181,  306 => 180,  303 => 179,  301 => 178,  298 => 177,  295 => 176,  293 => 175,  290 => 174,  287 => 173,  284 => 172,  281 => 171,  278 => 170,  275 => 169,  272 => 168,  270 => 167,  267 => 166,  264 => 165,  262 => 164,  259 => 163,  257 => 162,  254 => 161,  251 => 160,  248 => 137,  246 => 136,  243 => 135,  240 => 134,  237 => 111,  235 => 110,  232 => 109,  229 => 108,  226 => 103,  224 => 102,  221 => 101,  218 => 100,  215 => 72,  212 => 71,  209 => 69,  206 => 68,  203 => 66,  201 => 65,  198 => 64,  196 => 63,  193 => 62,  188 => 59,  185 => 58,  179 => 56,  176 => 55,  174 => 54,  171 => 53,  164 => 50,  161 => 49,  159 => 48,  154 => 47,  151 => 46,  149 => 45,  146 => 44,  141 => 41,  139 => 40,  136 => 39,  132 => 37,  130 => 36,  127 => 35,  123 => 33,  120 => 32,  118 => 31,  115 => 30,  108 => 27,  102 => 25,  99 => 24,  97 => 23,  94 => 22,  90 => 14,  84 => 12,  81 => 11,  78 => 9,  75 => 8,  63 => 7,  61 => 6,  56 => 5,  46 => 3,  43 => 2,  41 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@galleries/shortcode/helpers.twig", "/home/sites/5b/1/1dfcd1df43/public_html/wp-content/plugins/gallery-by-supsystic/src/GridGallery/Galleries/views/shortcode/helpers.twig");
    }
}
