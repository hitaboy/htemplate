<?php

global $countries;
$countries=array('AF'=>'Afghanistan','AX'=>'Åland Islands','AL'=>'Albania','DZ'=>'Algeria','AS'=>'American Samoa','AD'=>'Andorra','AO'=>'Angola','AI'=>'Anguilla','AG'=>'Antigua and Barbuda','AR'=>'Argentina','AM'=>'Armenia','AW'=>'Aruba','AU'=>'Australia','AT'=>'Austria','AZ'=>'Azerbaijan','BS'=>'Bahamas','BH'=>'Bahrain','BD'=>'Bangladesh','BB'=>'Barbados','BY'=>'Belarus','BE'=>'Belgium','BZ'=>'Belize','BJ'=>'Benin','BM'=>'Bermuda','BT'=>'Bhutan','BO'=>'Bolivia','BQ'=>'Bonaire, Sint Eustatius and Saba','BA'=>'Bosnia and Herzegovina','BW'=>'Botswana','BR'=>'Brazil','IO'=>'British Indian Ocean Territory (Chagos Archipelago)','VG'=>'British Virgin Islands','BN'=>'Brunei Darussalam','BG'=>'Bulgaria','BF'=>'Burkina Faso','BI'=>'Burundi','KH'=>'Cambodia','CM'=>'Cameroon','CA'=>'Canada','CV'=>'Cape Verde','KY'=>'Cayman Islands','CF'=>'Central African Republic','TD'=>'Chad','CL'=>'Chile','CN'=>'China','CX'=>'Christmas Island','CC'=>'Cocos (Keeling) Islands','CO'=>'Colombia','KM'=>'Comoros','CG'=>'Congo','CK'=>'Cook Islands','CR'=>'Costa Rica','CI'=>'Cote d\'Ivoire','HR'=>'Croatia','CU'=>'Cuba','CW'=>'Curaçao','CY'=>'Cyprus','CZ'=>'Czech Republic','DK'=>'Denmark','DJ'=>'Djibouti','DM'=>'Dominica','DO'=>'Dominican Republic','EC'=>'Ecuador','EG'=>'Egypt','SV'=>'El Salvador','GQ'=>'Equatorial Guinea','ER'=>'Eritrea','ES'=>'España','EE'=>'Estonia','ET'=>'Ethiopia','FK'=>'Falkland Islands (Malvinas)','FO'=>'Faroe Islands','FJ'=>'Fiji','FI'=>'Finland','FR'=>'selected="selected">France','GF'=>'French Guiana','PF'=>'French Polynesia','GA'=>'Gabon','GM'=>'Gambia','GE'=>'Georgia','DE'=>'Germany','GH'=>'Ghana','GI'=>'Gibraltar','GR'=>'Greece','GL'=>'Greenland','GD'=>'Grenada','GP'=>'Guadeloupe','GU'=>'Guam','GT'=>'Guatemala','GG'=>'Guernsey','GN'=>'Guinea','GW'=>'Guinea-Bissau','GY'=>'Guyana','HT'=>'Haiti','VA'=>'Holy See (Vatican City State)','HN'=>'Honduras','HK'=>'Hong Kong','HU'=>'Hungary','IS'=>'Iceland','IN'=>'India','ID'=>'Indonesia','IR'=>'Iran','IQ'=>'Iraq','IE'=>'Ireland','IM'=>'Isle of Man','IL'=>'Israel','IT'=>'Italy','JM'=>'Jamaica','JP'=>'Japan','JE'=>'Jersey','JO'=>'Jordan','KZ'=>'Kazakhstan','KE'=>'Kenya','KI'=>'Kiribati','KW'=>'Kuwait','KG'=>'Kyrgyz Republic','LV'=>'Latvia','LB'=>'Lebanon','LS'=>'Lesotho','LR'=>'Liberia','LY'=>'Libya','LI'=>'Liechtenstein','LT'=>'Lithuania','LU'=>'Luxembourg','MO'=>'Macao','MK'=>'Macedonia','MG'=>'Madagascar','MW'=>'Malawi','MY'=>'Malaysia','MV'=>'Maldives','ML'=>'Mali','MT'=>'Malta','MH'=>'Marshall Islands','MQ'=>'Martinique','MR'=>'Mauritania','MU'=>'Mauritius','YT'=>'Mayotte','MX'=>'Mexico','FM'=>'Micronesia','MD'=>'Moldova','MC'=>'Monaco','MN'=>'Mongolia','ME'=>'Montenegro','MS'=>'Montserrat','MA'=>'Morocco','MZ'=>'Mozambique','MM'=>'Myanmar','NA'=>'Namibia','NR'=>'Nauru','NP'=>'Nepal','NL'=>'Netherlands','NC'=>'New Caledonia','NZ'=>'New Zealand','NI'=>'Nicaragua','NG'=>'Nigeria','NE'=>'Niger','NU'=>'Niue','NF'=>'Norfolk Island','KP'=>'North Korea','MP'=>'Northern Mariana Islands','NO'=>'Norway','OM'=>'Oman','PK'=>'Pakistan','PW'=>'Palau','PS'=>'Palestinian Territory','PA'=>'Panama','PG'=>'Papua New Guinea','PY'=>'Paraguay','PE'=>'Peru','PH'=>'Philippines','PN'=>'Pitcairn Islands','PL'=>'Poland','PT'=>'Portugal','PR'=>'Puerto Rico','QA'=>'Qatar','RE'=>'Réunion','RO'=>'Romania','RU'=>'Russian Federation','RW'=>'Rwanda','BL'=>'Saint Barthélemy','SH'=>'Saint Helena, Ascension and Tristan da Cunha','KN'=>'Saint Kitts and Nevis','LC'=>'Saint Lucia','MF'=>'Saint Martin','PM'=>'Saint Pierre and Miquelon','VC'=>'Saint Vincent and the Grenadines','WS'=>'Samoa','SM'=>'San Marino','ST'=>'Sao Tome and Principe','SA'=>'Saudi Arabia','SN'=>'Senegal','RS'=>'Serbia','SC'=>'Seychelles','SL'=>'Sierra Leone','SG'=>'Singapore','SX'=>'Sint Maarten (Dutch part)','SK'=>'Slovakia (Slovak Republic)','SI'=>'Slovenia','SB'=>'Solomon Islands','SO'=>'Somalia','ZA'=>'South Africa','KR'=>'South Korea','SS'=>'South Sudan','LK'=>'Sri Lanka','SD'=>'Sudan','SR'=>'Suriname','SJ'=>'Svalbard &amp; Jan Mayen Islands','SZ'=>'Swaziland','SE'=>'Sweden','CH'=>'Switzerland','SY'=>'Syrian Arab Republic','TW'=>'Taiwan','TJ'=>'Tajikistan','TZ'=>'Tanzania','TH'=>'Thailand','TL'=>'Timor-Leste','TG'=>'Togo','TK'=>'Tokelau','TO'=>'Tonga','TT'=>'Trinidad and Tobago','TN'=>'Tunisia','TR'=>'Turkey','TM'=>'Turkmenistan','TC'=>'Turks and Caicos Islands','TV'=>'Tuvalu','UG'=>'Uganda','UA'=>'Ukraine','AE'=>'United Arab Emirates','GB'=>'United Kingdom','UM'=>'United States Minor Outlying Islands','VI'=>'United States Virgin Islands','US'=>'United States','UY'=>'Uruguay','UZ'=>'Uzbekistan','VU'=>'Vanuatu','VE'=>'Venezuela','VN'=>'Vietnam','WF'=>'Wallis and Futuna','EH'=>'Western Sahara','YE'=>'Yemen','ZM'=>'Zambia','ZW'=>'Zimbabwe');

if ( !is_admin() ) {
  if( $GLOBALS['pagenow'] != 'wp-login.php' ){

    global $country;

    if( !empty($_GET['country']) ){
      $country = $_GET['country'];
    }else{
      if ( ! class_exists( 'GeoIP' ) ) {
        include( WP_TEMPLATE_DIR.'/lib/geolocate/geoip.inc' );
      }
      $gi = geoip_open( WP_TEMPLATE_DIR.'/lib/geolocate/GeoIP.dat', GEOIP_STANDARD );
      if( $_SERVER['REMOTE_ADDR'] == "" ){
        $country = geoip_country_code_by_addr( $gi, $_SERVER['REMOTE_ADDR']);
      }else{
        $country = geoip_country_code_by_addr( $gi, '189.245.20.191'); // Spain market
      }
      // $country = geoip_country_code_by_addr( $gi, '83.56.38.149'); // Spain market
      // $country = geoip_country_code_by_addr( $gi, '189.245.20.191'); // Latam market
      //$this->country = $country;
      geoip_close( $gi );

    }

  }
}

?>
