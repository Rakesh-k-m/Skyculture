<?php 

	$one_login_business_sticky_header = get_theme_mod('one_login_business_sticky_header');

	$one_login_business_custom_style= "";

	if($one_login_business_sticky_header != true){

		$one_login_business_custom_style .='.main-top.fixed{';

			$one_login_business_custom_style .='position: static;';
			
		$one_login_business_custom_style .='}';
	}

	/*---------------------------Width -------------------*/
	
	$one_login_business_theme_width = get_theme_mod( 'one_login_business_width_options','full_width');

    if($one_login_business_theme_width == 'full_width'){

		$one_login_business_custom_style .='body{';

			$one_login_business_custom_style .='max-width: 100%;';

		$one_login_business_custom_style .='}';

	}else if($one_login_business_theme_width == 'container'){

		$one_login_business_custom_style .='body{';

			$one_login_business_custom_style .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';

		$one_login_business_custom_style .='}';

	}else if($one_login_business_theme_width == 'container_fluid'){

		$one_login_business_custom_style .='body{';

			$one_login_business_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

		$one_login_business_custom_style .='}';
	}