export function getResponsiveBgJs( control ) {
    'use strict';

    jQuery('html').addClass('responsive-background-img-ready');
    
    let device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device')

    jQuery( '.customize-control-ast-responsive-background .customize-control-content .background-container' ).removeClass( 'active' );

    jQuery( '.customize-control-ast-responsive-background .customize-control-content .background-container.' + device ).addClass( 'active' );

    jQuery( '.customize-control-ast-responsive-background .ast-responsive-btns li' ).removeClass( 'active' );

    jQuery( '.customize-control-ast-responsive-background .ast-responsive-btns li.' + device ).addClass( 'active' );

    jQuery('.wp-full-overlay-footer .devices button').on('click', function() {

        var device = jQuery(this).attr('data-device');

        jQuery( '.customize-control-ast-responsive-background .customize-control-content .background-container' ).removeClass( 'active' );
        jQuery( '.customize-control-ast-responsive-background .customize-control-content .background-container.' + device ).addClass( 'active' );
        jQuery( '.customize-control-ast-responsive-background .ast-responsive-btns li' ).removeClass( 'active' );
        jQuery( '.customize-control-ast-responsive-background .ast-responsive-btns li.' + device ).addClass( 'active' );
    });
    
    control.container.find( '.ast-responsive-btns button' ).on( 'click', function( event ) {

        var device = jQuery(this).attr('data-device');
        if( 'desktop' == device ) {
            device = 'tablet';
        } else if( 'tablet' == device ) {
            device = 'mobile';
        } else {
            device = 'desktop';
        }

        jQuery( '.wp-full-overlay-footer .devices button[data-device="' + device + '"]' ).trigger( 'click' );
    });
}
export function getResponsiveColorJs( control ) {
    'use strict';

    jQuery('html').addClass('responsive-background-color-ready');

    let device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device')

    jQuery( '.customize-control-ast-responsive-color .customize-control-content .ast-color-picker-alpha' ).removeClass( 'active' );

    jQuery( '.customize-control-ast-responsive-color .customize-control-content .ast-color-picker-alpha.' + device ).addClass( 'active' );

    jQuery( '.customize-control-ast-responsive-color .ast-responsive-btns li' ).removeClass( 'active' );

    jQuery( '.customize-control-ast-responsive-color .ast-responsive-btns li.' + device ).addClass( 'active' );

    jQuery('.wp-full-overlay-footer .devices button').on('click', function() {

        var device = jQuery(this).attr('data-device');

        jQuery( '.customize-control-ast-responsive-color .customize-control-content .ast-color-picker-alpha' ).removeClass( 'active' );
        jQuery( '.customize-control-ast-responsive-color .customize-control-content .ast-responsive-color.' + device ).addClass( 'active' );
        jQuery( '.customize-control-ast-responsive-color .ast-responsive-btns li' ).removeClass( 'active' );
        jQuery( '.customize-control-ast-responsive-color .ast-responsive-btns li.' + device ).addClass( 'active' );
    });

    control.container.find( '.ast-responsive-btns button' ).on( 'click', function( event ) {

        var device = jQuery(this).attr('data-device');
        if( 'desktop' == device ) {
            device = 'tablet';
        } else if( 'tablet' == device ) {
            device = 'mobile';
        } else {
            device = 'desktop';
        }

        jQuery( '.wp-full-overlay-footer .devices button[data-device="' + device + '"]' ).trigger( 'click' );
    });
}
export function getResponsiveJs ( control ) {
    'use strict';

    let device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device')

    jQuery( '.customize-control-ast-responsive .input-wrapper input' ).removeClass( 'active' );

    jQuery( '.customize-control-ast-responsive .input-wrapper input.' + device ).addClass( 'active' );

    jQuery( '.customize-control-ast-responsive .ast-responsive-btns li' ).removeClass( 'active' );

    jQuery( '.customize-control-ast-responsive .ast-responsive-btns li.' + device ).addClass( 'active' );

    jQuery('.wp-full-overlay-footer .devices button').on('click', function() {

        var device = jQuery(this).attr('data-device');

        jQuery( '.customize-control-ast-responsive .input-wrapper input, .customize-control .ast-responsive-btns > li' ).removeClass( 'active' );
        jQuery( '.customize-control-ast-responsive .input-wrapper input.' + device + ', .customize-control .ast-responsive-btns > li.' + device ).addClass( 'active' );
        
    });

    control.container.find( '.ast-responsive-btns button' ).on( 'click', function( event ) {

        var device = jQuery(this).attr('data-device');
        if( 'desktop' == device ) {
            device = 'tablet';
        } else if( 'tablet' == device ) {
            device = 'mobile';
        } else {
            device = 'desktop';
        }

        jQuery( '.wp-full-overlay-footer .devices button[data-device="' + device + '"]' ).trigger( 'click' );
    });
}
export function getResponsiveSliderJs ( control ) {
    'use strict';

    let device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device')

    jQuery( '.customize-control-ast-responsive-slider .input-field-wrapper' ).removeClass( 'active' );

    jQuery( '.customize-control-ast-responsive-slider .input-field-wrapper.' + device ).addClass( 'active' );

    jQuery( '.customize-control-ast-responsive-slider .ast-responsive-slider-btns li' ).removeClass( 'active' );

    jQuery( '.customize-control-ast-responsive-slider .ast-responsive-slider-btns li.' + device ).addClass( 'active' );

    jQuery('.wp-full-overlay-footer .devices button').on('click', function() {

        var device = jQuery(this).attr('data-device');

        jQuery( '.customize-control-ast-responsive-slider .input-field-wrapper, .customize-control .ast-responsive-slider-btns > li' ).removeClass( 'active' );
        jQuery( '.customize-control-ast-responsive-slider .input-field-wrapper.' + device + ', .customize-control .ast-responsive-slider-btns > li.' + device ).addClass( 'active' );
    });

    control.container.find( '.ast-responsive-slider-btns button' ).on( 'click', function( event ) {

        var device = jQuery(this).attr('data-device');
        if( 'desktop' == device ) {
            device = 'tablet';
        } else if( 'tablet' == device ) {
            device = 'mobile';
        } else {
            device = 'desktop';
        }

        jQuery( '.wp-full-overlay-footer .devices button[data-device="' + device + '"]' ).trigger( 'click' );
    });
}
export function getResponsiveSpacingJs ( control ) {
    'use strict';

    let device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device')

    jQuery( '.customize-control-ast-responsive-spacing .input-wrapper .ast-spacing-wrapper' ).removeClass( 'active' );

    jQuery( '.customize-control-ast-responsive-spacing .input-wrapper .ast-spacing-wrapper.' + device ).addClass( 'active' );

    jQuery( '.customize-control-ast-responsive-spacing .ast-spacing-responsive-btns li' ).removeClass( 'active' );

    jQuery( '.customize-control-ast-responsive-spacing .ast-spacing-responsive-btns li.' + device ).addClass( 'active' );

    jQuery('.wp-full-overlay-footer .devices button').on('click', function() {

        var device = jQuery(this).attr('data-device');

        jQuery( '.customize-control-ast-responsive-spacing .input-wrapper .ast-spacing-wrapper, .customize-control .ast-spacing-responsive-btns > li' ).removeClass( 'active' );
        jQuery( '.customize-control-ast-responsive-spacing .input-wrapper .ast-spacing-wrapper.' + device + ', .customize-control .ast-spacing-responsive-btns > li.' + device ).addClass( 'active' );
    });

    control.container.find( '.ast-spacing-responsive-btns button' ).on( 'click', function( event ) {

        var device = jQuery(this).attr('data-device');
        if( 'desktop' == device ) {
            device = 'tablet';
        } else if( 'tablet' == device ) {
            device = 'mobile';
        } else {
            device = 'desktop';
        }

        jQuery( '.wp-full-overlay-footer .devices button[data-device="' + device + '"]' ).trigger( 'click' );
    });
}