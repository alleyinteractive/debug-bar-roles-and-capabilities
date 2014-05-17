<?php
/*
	Plugin Name: Debug Bar Roles and Capabilities
	Plugin URI: http://github.com/alleyinteractive.com/debug-bar-roles-and-capabilities
	Description: A simple add-on for Debug Bar that tabulates all roles and capabilities
	Version: 0.1.2
	Author: Matthew Boynes
	Author URI: http://www.alleyinteractive.com/
*/
/*  This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

function dbrac_add_panel( $panels ) {
	require_once( 'class-debug-bar-roles-and-capabilities-panel.php' );
	$panels[] = new Debug_Bar_Roles_And_Capabilities_Panel();
	return $panels;
}
add_filter( 'debug_bar_panels', 'dbrac_add_panel' );
