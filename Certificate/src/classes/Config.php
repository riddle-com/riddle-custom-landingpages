<?php

/**
 *
 * IT'S NOT RECOMMENDED TO CHANGE THESE VALUES.
 * PLEASE CHANGE THESE VALUES ONLY IF YOU KNOW WHAT YOU'RE EXACTLY DOING
 *
 */

define("FPDF_FONTPATH", ROOT . "/src/files/fonts");


/**
 *
 * ========================================
 *
 * FEEL FREE TO CUSTOMIZE THIS PART!
 *
 */


/**
 * Date format;
 * Further explanation:
 * d = day (1-31); m = month(1-12); y = year (without millenium; 2018 => 18); Y = year (with millenium)
 */
define("DATE_FORMAT", "d.m.Y");

/**
 * How many percent must a user have to pass the test? (0-100)
 */
define("PERCENT_TO_PASS", 90);

/**
 * HTML-files (see public/html)
 */
define("PAGE_SUCCESS", "landingpage-success");
define("PAGE_FAIL", "landingpage-fail");

/**
 * Default font
 */
define("DEFAULT_FONT", "opensans-regular");

/**
 * Default Font Size!
 */
define("DEFAULT_FONT_SIZE", 11);

/**
 * Name of the PDF-File you want to use (has to be in the directory src/files/pdf)
 * WARNING! WITHOUT EXTENSION
 */
define("PDF_FILE", "pdf-template");