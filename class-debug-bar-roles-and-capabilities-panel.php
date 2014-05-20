<?php

class Debug_Bar_Roles_And_Capabilities_Panel extends Debug_Bar_Panel {

	public function init() {
		$this->title( __( 'Roles and Capabilities', 'debug-bar-roles-and-capabilities' ) );
	}

	public function prerender() {
		$this->set_visible( true );
	}

	public function render() {
		global $wp_roles;
		$capabilities = array();
		foreach ( $wp_roles->roles as $role ) {
			$capabilities = array_merge( $capabilities, $role['capabilities'] );
		}
		$capabilities = array_keys( $capabilities );
		$roles = array();
		?>
		<style type="text/css">
		#dbrac-output table {
			border-top: 1px solid #aaa;
			border-left: 1px solid #aaa;
			border-collapse: collapse;
			font-size: 1.1em;
		}
		#dbrac-output th,
		#dbrac-output td {
			padding: 5px 8px;
			border-bottom: 1px solid #aaa;
			border-right: 1px solid #aaa;
		}
		#dbrac-output td {
			text-align: center;
		}
		#dbrac-output tbody tr:hover th,
		#dbrac-output tbody tr:hover td {
			background: white;
		}
		</style>
		<div id="dbrac-output">
			<table>
				<thead>
					<tr>
						<th>Capability</th>
						<?php foreach ( $wp_roles->role_names as $role => $name ) : $roles[] = $role; ?>
						<th><?php echo $name; ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $capabilities as $capability ) : ?>
						<tr>
							<th scope="row"><?php echo $capability; ?></th>
							<?php
							foreach ( $roles as $role ) {
								$has_cap = $wp_roles->role_objects[ $role ]->has_cap( $capability );
								echo '<td class="' . ( $has_cap ? 'on' : 'off' ) . '">' . ( $has_cap ? '&#10003;' : '&nbsp;' ) . '</td>';
							}
							?>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
		<?php
	}
}