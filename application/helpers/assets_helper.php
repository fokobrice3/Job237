<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	if ( ! function_exists('css_url')){
		function css_url($nom){
			return base_url() . 'assets/css/' . $nom . '.css';
		}
	}
	if ( ! function_exists('less_url')){
		function less_url($nom){
			return base_url() . 'assets/less/' . $nom . '.less';
		}
	}
	if ( ! function_exists('js_url')){
		function js_url($nom){
			return base_url() . 'assets/js/'. $nom . '.js';
		}
	}
	if ( ! function_exists('tiny_url')){
		function tiny_url($nom){
			return base_url() . 'assets/tinymce/' . $nom . '.js';
		}
	}
	if ( ! function_exists('img_url')){
		function img_url($nom){
			return base_url() . 'assets/img/'. $nom;
		}
	}
	if ( ! function_exists('slide_url')){
		function slide_url($nom){
			return base_url() . 'assets/slideshow/'. $nom;
		}
	}
	if ( ! function_exists('file_url')){
		function file_url($nom){
			return base_url() . 'assets/uploads/'. $nom;
		}
	}
	if ( ! function_exists('ck5_classic')){
		function ck5_classic($nom){
			return base_url() . 'assets/ckeditor5-classic/'. $nom;
		}
	}
	if ( ! function_exists('froala')){
		function froala($nom){
			return base_url() . 'assets/froala/'. $nom;
		}
	}
	if ( ! function_exists('ui')){
		function ui($nom){
			return base_url() . 'assets/ui/'. $nom;
		}
	}
	if ( ! function_exists('resume_url')){
		function resume_url($nom){
			return base_url() . 'assets/resume/'. $nom;
		}
	}
	if ( ! function_exists('article_url')){
		function article_url($nom){
			return base_url() . 'assets/articles/'. $nom;
		}
	}
	if ( ! function_exists('lettre_motivation')){
		function lettre_motivation($nom){
			return base_url() . 'assets/lettre_motivation/'. $nom;
		}
	}
	if ( ! function_exists('vendor')){
		function vendor($nom){
			return base_url() . 'assets/vendor/'. $nom;
		}
	}
	if ( ! function_exists('asset_url')){
		function asset_url($nom){
			return base_url() . 'assets/'. $nom;
		}
	}
	