/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links', 	   groups: ['VideoDetector'] },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
	config.extraPlugins = 'codesnippet,preview,colordialog,smiley,font,embed,div,flash,iframe,save,newpage,table,autoembed,autolink,indentblock,justify,liststyle,placeholder,selectall,tableresize,tabletools,colorbutton,videodetector';
	config.skin = 'bootstrapck';
	config.allowedContent = true;
	config.contentsCss = [ CKEDITOR.getUrl('contents.css'), '/css/fonts.css' ];
	config.font_names = 'Arial/Arial, Helvetica, sans-serif;' +
    'Comic Sans MS/Comic Sans MS, cursive;' +
    'Courier New/Courier New, Courier, monospace;' +
    'Georgia/Georgia, serif;' +
    'Lucida Sans Unicode/Lucida Sans Unicode, Lucida Grande, sans-serif;' +
    'Tahoma/Tahoma, Geneva, sans-serif;' +
    'Times New Roman/Times New Roman, Times, serif;' +
    'Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;' +
    'Verdana/Verdana, Geneva, sans-serif;' + 
    'BNazanin/BNazanin;' + 'BZiba/BZiba;' + 'BBadr/BBadr;' + 'BBardia/BBardia;' + 'BCompset/BCompset;' +
    'BElham/BElham;' + 'BFarnaz/BFarnaz;' + 'BHamid/BHamid;' + 'BFerdosi/BFerdosi;' +
    'BHelal/BHelal;' + 'BHoma/BHoma;' + 'BKoodakBold/BKoodakBold;' + 'BMahsa/BMahsa;' +
    'BMehrBold/BMehrBold;' + 'BMitra/BMitra;' +'BMorvarid/BMorvarid;' + 'BTabassom/BTabassom;' +
    'BTitrBold/BTitrBold;' + 'BTraffic/BTraffic;' + 'BYas/BYas;' + 'BYekan/BYekan;' +
    'BZar/BZar;' + 'irsans/irsans;' + 'BShiraz/BShiraz;' + 'BNasimBold/BNasimBold;' + 'BJalal/BJalal;' +
    'BNarm/BNarm;' + 'BRoya/BRoya;';

};
