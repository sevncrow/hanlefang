/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.language = 'zh-cn';
	/*config.filebrowserImageUploadUrl = 'http://hanlefang.local/admin/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
 	config.filebrowserBrowseUrl = 'http://hanlefang.local/admin/js/plugin/ckfinder/ckfinder.html';   
    config.filebrowserImageBrowseUrl = 'http://hanlefang.local/admin/js/plugin/ckfinder/ckfinder.html?Type=Images';  
    config.filebrowserFlashBrowseUrl = 'http://hanlefang.local/admin/js/plugin/ckfinder/ckfinder.html?Type=Flash';  
*/
    config.filebrowserBrowseUrl      = 'http://hanlefang.local/admin/js/plugin/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = 'http://hanlefang.local/admin/js/plugin/ckfinder/ckfinder.html?Type=Images';
    config.filebrowserFlashBrowseUrl = 'http://hanlefang.local/admin/js/plugin/ckfinder/ckfinder.html?Type=Flash';
    config.filebrowserUploadUrl      = 'http://hanlefang.local/admin/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = 'http://hanlefang.local/admin/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = 'http://hanlefang.local/admin/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
