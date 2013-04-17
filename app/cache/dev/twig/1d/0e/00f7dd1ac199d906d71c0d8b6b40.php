<?php

/* BcBootstrapBundle:Pagination:pagination.html.twig */
class __TwigTemplate_1d0e00f7dd1ac199d906d71c0d8b6b40 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
";
        // line 3
        if ((!array_key_exists("style", $context))) {
            // line 4
            echo "    ";
            $context["style"] = "pagination";
        }
        // line 6
        echo "
";
        // line 7
        if ((!array_key_exists("prev_label", $context))) {
            // line 8
            echo "    ";
            $context["prev_label"] = "Previous";
        }
        // line 10
        if ((!array_key_exists("next_label", $context))) {
            // line 11
            echo "    ";
            $context["next_label"] = "Next";
        }
        // line 13
        if ((!array_key_exists("first_label", $context))) {
            // line 14
            echo "    ";
            $context["first_label"] = "First";
        }
        // line 16
        if ((!array_key_exists("last_label", $context))) {
            // line 17
            echo "    ";
            $context["last_label"] = "Last";
        }
        // line 19
        echo "

";
        // line 21
        if (($this->getContext($context, "pageCount") > 1)) {
            // line 22
            echo "    ";
            if (($this->getContext($context, "style") == "pagination")) {
                // line 23
                echo "        ";
                $context["orientation_class"] = "";
                // line 24
                echo "        ";
                if (array_key_exists("alignment", $context)) {
                    // line 25
                    echo "            ";
                    if (($this->getContext($context, "alignment") == "center")) {
                        // line 26
                        echo "                ";
                        $context["orientation_class"] = " pagination-centered";
                        // line 27
                        echo "            ";
                    } elseif (($this->getContext($context, "alignment") == "right")) {
                        // line 28
                        echo "                ";
                        $context["orientation_class"] = " pagination-right";
                        // line 29
                        echo "            ";
                    }
                    // line 30
                    echo "        ";
                }
                // line 31
                echo "
        <div class=\"pagination";
                // line 32
                echo twig_escape_filter($this->env, $this->getContext($context, "orientation_class"), "html", null, true);
                echo "\">
            <ul>
            ";
                // line 34
                if ((array_key_exists("first", $context) && ($this->getContext($context, "current") != $this->getContext($context, "first")))) {
                    // line 35
                    echo "                <li><a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "first")))), "html", null, true);
                    echo "\">";
                    echo $this->getContext($context, "first_label");
                    echo "</a></li>
            ";
                }
                // line 37
                echo "
            ";
                // line 38
                if (array_key_exists("previous", $context)) {
                    // line 39
                    echo "                <li><a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "previous")))), "html", null, true);
                    echo "\">";
                    echo $this->getContext($context, "prev_label");
                    echo "</a></li>
            ";
                }
                // line 41
                echo "
            ";
                // line 42
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "pagesInRange"));
                foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                    // line 43
                    echo "                ";
                    if (($this->getContext($context, "page") != $this->getContext($context, "current"))) {
                        // line 44
                        echo "                    <li><a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "page")))), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getContext($context, "page"), "html", null, true);
                        echo "</a></li>
                ";
                    } else {
                        // line 46
                        echo "                    <li class=\"active\"><span>";
                        echo twig_escape_filter($this->env, $this->getContext($context, "page"), "html", null, true);
                        echo "</span></li>
                ";
                    }
                    // line 48
                    echo "
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 50
                echo "
            ";
                // line 51
                if (array_key_exists("next", $context)) {
                    // line 52
                    echo "                <li><a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "next")))), "html", null, true);
                    echo "\">";
                    echo $this->getContext($context, "next_label");
                    echo "</a></li>
            ";
                }
                // line 54
                echo "
            ";
                // line 55
                if ((array_key_exists("last", $context) && ($this->getContext($context, "current") != $this->getContext($context, "last")))) {
                    // line 56
                    echo "                <li><a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "last")))), "html", null, true);
                    echo "\">";
                    echo $this->getContext($context, "last_label");
                    echo "</a></li>
            ";
                }
                // line 58
                echo "            </ul>
        </div>
    ";
            } else {
                // line 61
                echo "        ";
                if ((!array_key_exists("aligned", $context))) {
                    // line 62
                    echo "            ";
                    $context["aligned"] = false;
                    // line 63
                    echo "        ";
                }
                // line 64
                echo "        <ul class=\"pager\">
            ";
                // line 65
                if (array_key_exists("previous", $context)) {
                    // line 66
                    echo "                <li";
                    if ($this->getContext($context, "aligned")) {
                        echo " class=\"previous\"";
                    }
                    echo "><a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "previous")))), "html", null, true);
                    echo "\">";
                    echo $this->getContext($context, "prev_label");
                    echo "</a></li>
            ";
                } else {
                    // line 68
                    echo "                <li class=\"disabled";
                    if ($this->getContext($context, "aligned")) {
                        echo " previous";
                    }
                    echo "\"><span>";
                    echo $this->getContext($context, "prev_label");
                    echo "</span></li>
            ";
                }
                // line 70
                echo "            ";
                if (array_key_exists("next", $context)) {
                    // line 71
                    echo "                <li";
                    if ($this->getContext($context, "aligned")) {
                        echo " class=\"next\"";
                    }
                    echo "><a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "next")))), "html", null, true);
                    echo "\">";
                    echo $this->getContext($context, "next_label");
                    echo "</a></li>
            ";
                } else {
                    // line 73
                    echo "                <li class=\"disabled";
                    if ($this->getContext($context, "aligned")) {
                        echo " next";
                    }
                    echo "\"><span>";
                    echo $this->getContext($context, "next_label");
                    echo "</span></li>
            ";
                }
                // line 75
                echo "        </ul>
    ";
            }
        }
    }

    public function getTemplateName()
    {
        return "BcBootstrapBundle:Pagination:pagination.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  242 => 75,  232 => 73,  195 => 66,  190 => 64,  181 => 61,  155 => 52,  482 => 4,  476 => 2,  465 => 1,  455 => 173,  445 => 171,  424 => 161,  416 => 158,  401 => 155,  391 => 149,  375 => 141,  367 => 136,  363 => 134,  359 => 132,  356 => 130,  352 => 129,  349 => 126,  347 => 125,  344 => 122,  334 => 114,  326 => 109,  324 => 108,  321 => 106,  319 => 105,  316 => 103,  313 => 101,  311 => 100,  304 => 96,  300 => 93,  281 => 89,  262 => 87,  257 => 84,  255 => 82,  253 => 81,  250 => 79,  238 => 73,  233 => 71,  219 => 64,  216 => 63,  213 => 62,  211 => 61,  200 => 55,  191 => 52,  188 => 51,  185 => 50,  153 => 51,  150 => 50,  110 => 21,  81 => 170,  76 => 27,  59 => 21,  34 => 9,  1819 => 553,  1813 => 552,  1807 => 551,  1801 => 550,  1795 => 549,  1789 => 548,  1783 => 547,  1777 => 546,  1771 => 545,  1755 => 539,  1748 => 538,  1746 => 537,  1743 => 536,  1720 => 532,  1695 => 531,  1693 => 530,  1690 => 529,  1678 => 524,  1674 => 523,  1671 => 522,  1668 => 521,  1665 => 520,  1662 => 519,  1659 => 518,  1657 => 517,  1654 => 516,  1645 => 509,  1642 => 508,  1640 => 507,  1637 => 506,  1628 => 501,  1625 => 500,  1623 => 499,  1620 => 498,  1603 => 494,  1597 => 492,  1594 => 491,  1576 => 490,  1574 => 489,  1571 => 488,  1563 => 482,  1556 => 480,  1553 => 476,  1549 => 475,  1545 => 473,  1540 => 470,  1538 => 466,  1535 => 465,  1532 => 464,  1530 => 463,  1527 => 462,  1520 => 457,  1513 => 455,  1510 => 451,  1506 => 450,  1503 => 449,  1499 => 447,  1496 => 443,  1493 => 442,  1491 => 441,  1488 => 440,  1480 => 436,  1478 => 435,  1475 => 434,  1468 => 429,  1465 => 428,  1458 => 424,  1453 => 423,  1451 => 422,  1448 => 421,  1439 => 415,  1435 => 414,  1431 => 412,  1429 => 411,  1426 => 410,  1418 => 405,  1413 => 404,  1407 => 402,  1404 => 401,  1402 => 397,  1400 => 396,  1397 => 395,  1388 => 389,  1384 => 388,  1379 => 386,  1368 => 385,  1366 => 384,  1363 => 383,  1356 => 380,  1353 => 379,  1345 => 374,  1341 => 373,  1336 => 372,  1330 => 370,  1324 => 368,  1321 => 367,  1319 => 366,  1316 => 365,  1308 => 361,  1306 => 357,  1304 => 356,  1301 => 355,  1292 => 348,  1276 => 347,  1272 => 345,  1269 => 344,  1266 => 343,  1263 => 342,  1260 => 341,  1257 => 340,  1254 => 339,  1251 => 338,  1248 => 337,  1245 => 336,  1242 => 335,  1239 => 334,  1236 => 333,  1234 => 332,  1231 => 331,  1222 => 327,  1206 => 326,  1202 => 324,  1199 => 323,  1196 => 322,  1193 => 321,  1190 => 320,  1187 => 319,  1184 => 318,  1181 => 317,  1178 => 316,  1175 => 315,  1172 => 314,  1169 => 313,  1166 => 312,  1164 => 311,  1161 => 310,  1140 => 306,  1137 => 305,  1134 => 304,  1131 => 303,  1128 => 302,  1125 => 301,  1122 => 300,  1119 => 299,  1116 => 298,  1113 => 297,  1110 => 296,  1107 => 295,  1104 => 294,  1102 => 293,  1099 => 292,  1091 => 286,  1088 => 285,  1086 => 284,  1083 => 283,  1075 => 279,  1072 => 278,  1070 => 277,  1067 => 276,  1059 => 272,  1056 => 271,  1054 => 270,  1051 => 269,  1043 => 265,  1040 => 264,  1038 => 263,  1035 => 262,  1027 => 258,  1024 => 257,  1021 => 256,  1019 => 255,  1016 => 254,  1008 => 250,  1005 => 249,  1003 => 248,  1000 => 247,  992 => 243,  990 => 242,  987 => 241,  979 => 237,  976 => 236,  974 => 235,  971 => 234,  963 => 230,  960 => 229,  958 => 228,  956 => 227,  953 => 226,  946 => 221,  938 => 220,  933 => 219,  927 => 217,  924 => 216,  922 => 215,  919 => 214,  911 => 208,  909 => 207,  908 => 206,  907 => 205,  906 => 204,  901 => 203,  895 => 201,  892 => 200,  890 => 199,  887 => 198,  878 => 192,  874 => 191,  870 => 190,  866 => 189,  861 => 188,  855 => 186,  852 => 185,  850 => 184,  847 => 183,  831 => 179,  829 => 178,  826 => 177,  810 => 173,  808 => 172,  805 => 171,  788 => 167,  776 => 165,  769 => 162,  767 => 161,  762 => 160,  759 => 159,  741 => 158,  739 => 157,  736 => 156,  727 => 151,  724 => 150,  721 => 149,  715 => 147,  713 => 146,  708 => 145,  705 => 144,  702 => 143,  696 => 141,  694 => 140,  686 => 139,  684 => 138,  681 => 137,  669 => 132,  664 => 131,  661 => 130,  659 => 129,  656 => 128,  647 => 123,  641 => 121,  638 => 120,  636 => 119,  633 => 118,  623 => 114,  621 => 113,  618 => 112,  610 => 108,  607 => 107,  604 => 106,  601 => 105,  599 => 104,  596 => 103,  588 => 98,  583 => 97,  577 => 95,  575 => 94,  570 => 93,  568 => 92,  565 => 91,  558 => 86,  552 => 84,  546 => 82,  544 => 81,  538 => 79,  535 => 78,  533 => 77,  530 => 76,  528 => 75,  525 => 74,  516 => 69,  514 => 68,  511 => 67,  505 => 65,  499 => 63,  497 => 62,  493 => 60,  491 => 59,  488 => 58,  481 => 53,  475 => 51,  467 => 48,  458 => 45,  456 => 44,  447 => 41,  441 => 39,  439 => 38,  433 => 35,  421 => 160,  418 => 159,  412 => 26,  395 => 151,  389 => 21,  383 => 145,  377 => 142,  371 => 138,  369 => 14,  366 => 13,  357 => 8,  351 => 6,  348 => 5,  346 => 4,  343 => 3,  339 => 119,  335 => 551,  333 => 550,  331 => 112,  329 => 111,  327 => 547,  325 => 546,  323 => 545,  320 => 544,  317 => 542,  315 => 536,  310 => 529,  307 => 97,  302 => 515,  299 => 513,  297 => 506,  292 => 498,  289 => 497,  287 => 488,  284 => 487,  282 => 462,  279 => 461,  277 => 440,  274 => 439,  272 => 434,  269 => 433,  266 => 431,  261 => 427,  259 => 85,  256 => 420,  254 => 410,  251 => 409,  249 => 395,  244 => 383,  239 => 379,  236 => 72,  234 => 365,  231 => 364,  226 => 354,  222 => 351,  217 => 70,  215 => 310,  212 => 309,  210 => 292,  207 => 68,  204 => 289,  202 => 283,  197 => 276,  194 => 275,  192 => 269,  184 => 62,  179 => 48,  174 => 46,  172 => 241,  167 => 234,  159 => 41,  152 => 198,  137 => 46,  134 => 170,  129 => 44,  127 => 137,  124 => 136,  104 => 102,  102 => 91,  97 => 74,  77 => 3,  480 => 3,  474 => 161,  469 => 49,  461 => 46,  457 => 153,  453 => 43,  444 => 149,  440 => 167,  437 => 166,  435 => 36,  430 => 34,  427 => 162,  423 => 142,  413 => 157,  409 => 25,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 147,  384 => 121,  381 => 144,  379 => 143,  374 => 16,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 120,  337 => 117,  322 => 101,  314 => 99,  312 => 535,  309 => 99,  305 => 516,  298 => 92,  294 => 505,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 88,  258 => 81,  252 => 80,  247 => 78,  241 => 74,  235 => 74,  229 => 355,  224 => 65,  220 => 71,  214 => 69,  208 => 60,  169 => 240,  143 => 48,  140 => 55,  132 => 156,  128 => 30,  119 => 41,  107 => 103,  71 => 156,  38 => 6,  177 => 247,  165 => 43,  160 => 61,  135 => 47,  126 => 43,  114 => 117,  84 => 171,  70 => 25,  67 => 24,  61 => 22,  94 => 73,  89 => 173,  85 => 30,  75 => 23,  68 => 14,  56 => 78,  87 => 34,  21 => 2,  26 => 6,  93 => 9,  88 => 31,  78 => 21,  46 => 59,  27 => 4,  44 => 29,  31 => 7,  28 => 6,  196 => 54,  183 => 70,  171 => 45,  166 => 55,  163 => 54,  158 => 67,  156 => 40,  151 => 57,  142 => 177,  138 => 34,  136 => 33,  121 => 26,  117 => 118,  105 => 15,  91 => 32,  62 => 23,  49 => 16,  24 => 4,  25 => 3,  19 => 2,  79 => 28,  72 => 16,  69 => 155,  47 => 9,  40 => 8,  37 => 10,  22 => 3,  246 => 394,  157 => 214,  145 => 46,  139 => 176,  131 => 42,  123 => 47,  120 => 40,  115 => 43,  111 => 39,  108 => 20,  101 => 32,  98 => 35,  96 => 34,  83 => 25,  74 => 157,  66 => 154,  55 => 19,  52 => 21,  50 => 10,  43 => 13,  41 => 28,  35 => 5,  32 => 4,  29 => 9,  209 => 82,  203 => 78,  199 => 282,  193 => 65,  189 => 268,  187 => 63,  182 => 49,  176 => 58,  173 => 74,  168 => 56,  164 => 233,  162 => 42,  154 => 213,  149 => 197,  147 => 37,  144 => 36,  141 => 35,  133 => 32,  130 => 31,  125 => 29,  122 => 42,  116 => 24,  112 => 22,  109 => 38,  106 => 37,  103 => 37,  99 => 90,  95 => 34,  92 => 58,  86 => 172,  82 => 29,  80 => 19,  73 => 26,  64 => 23,  60 => 6,  57 => 11,  54 => 71,  51 => 17,  48 => 13,  45 => 14,  42 => 7,  39 => 11,  36 => 14,  33 => 8,  30 => 7,);
    }
}
