/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.enterMode = CKEDITOR.ENTER_BR;
	config.shiftEnterMode = CKEDITOR.ENTER_P;
	config.entities  = false;
    config . toolbarGroups =  [
    { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
    { name: 'insert' },
    { name: 'links' },
    { name: 'tools' },
    { name :  'paragraph' ,    groups :  [  'list' ,  'blocks' ,  'align' ,'basicstyles' ]  },
    { name :  'styles'  },
    { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
    { name: 'colors' },
];
};
