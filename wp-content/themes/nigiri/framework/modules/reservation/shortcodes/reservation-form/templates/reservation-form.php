<div class="eltdf-rf-holder <?php echo esc_attr( $holder_class ); ?>">
	<?php if($open_table_id !== '') : ?>
		<form class="eltdf-rf" target="_blank" action="http://www.opentable.com/restaurant-search.aspx" name="eltdf-rf">
			<div class="eltdf-rf-row clearfix">
				<div class="eltdf-rf-col-holder">
					<div class="eltdf-rf-field-holder clearfix">
						<select name="partySize" class="eltdf-ot-people">
							<option value="1"><?php esc_html_e('1 Person', 'nigiri'); ?></option>
							<option value="2"><?php esc_html_e('2 People', 'nigiri'); ?></option>
							<option value="3"><?php esc_html_e('3 People', 'nigiri'); ?></option>
							<option value="4"><?php esc_html_e('4 People', 'nigiri'); ?></option>
							<option value="5"><?php esc_html_e('5 People', 'nigiri'); ?></option>
							<option value="6"><?php esc_html_e('6 People', 'nigiri'); ?></option>
							<option value="7"><?php esc_html_e('7 People', 'nigiri'); ?></option>
							<option value="8"><?php esc_html_e('8 People', 'nigiri'); ?></option>
							<option value="9"><?php esc_html_e('9 People', 'nigiri'); ?></option>
							<option value="10"><?php esc_html_e('10 People', 'nigiri'); ?></option>
						</select>
					<span class="eltdf-rf-icon">
						<span class="ion-ios-personadd-outline"></span>
					</span>
					</div>
				</div>

				<div class="eltdf-rf-col-holder">
					<div class="eltdf-rf-field-holder clearfix">
						<input type="text" value="<?php echo date('m/d/Y'); ?>" class="eltdf-ot-date" name="startDate">
						<span class="eltdf-rf-icon">
							<span class="ion-ios-list-outline"></span>
						</span>
					</div>
				</div>

				<div class="eltdf-rf-col-holder eltdf-rf-time-col">
					<div class="eltdf-rf-field-holder clearfix">
						<select name="ResTime" class="eltdf-ot-time">
							<option value="6:30am">6:30 am</option>
							<option value="7:00am">7:00 am</option>
							<option value="7:30am">7:30 am</option>
							<option value="8:00am">8:00 am</option>
							<option value="8:30am">8:30 am</option>
							<option value="9:00am">9:00 am</option>
							<option value="9:30am">9:30 am</option>
							<option value="10:00pm">10:00 am</option>
							<option value="10:30am">10:30 am</option>
							<option value="11:00am">11:00 am</option>
							<option value="11:30am">11:30 am</option>
							<option value="12:00pm">12:00 pm</option>
							<option value="12:30pm">12:30 pm</option>
							<option value="1:00pm">1:00 pm</option>
							<option value="1:30pm">1:30 pm</option>
							<option value="2:00pm">2:00 pm</option>
							<option value="2:30pm">2:30 pm</option>
							<option value="3:00pm">3:00 pm</option>
							<option value="3:30pm">3:30 pm</option>
							<option value="4:00pm">4:00 pm</option>
							<option value="4:30pm">4:30 pm</option>
							<option value="5:00pm">5:00 pm</option>
							<option value="5:30pm">5:30 pm</option>
							<option value="6:00pm">6:00 pm</option>
							<option value="6:30pm">6:30 pm</option>
							<option value="7:00pm" selected="selected">7:00 pm</option>
							<option value="7:30pm">7:30 pm</option>
							<option value="8:00pm">8:00 pm</option>
							<option value="8:30pm">8:30 pm</option>
							<option value="9:00pm">9:00 pm</option>
							<option value="9:30pm">9:30 pm</option>
							<option value="10:00pm">10:00 pm</option>
							<option value="10:30pm">10:30 pm</option>
							<option value="11:00pm">11:00 pm</option>
							<option value="11:30pm">11:30 pm</option>
						</select>
                        <span class="eltdf-rf-icon">
                            <span class="ion-ios-time-outline"></span>
                        </span>
					</div>
				</div>
				<div class="eltdf-rf-col-holder eltdf-rf-btn-holder">
					<?php if(nigiri_elated_core_plugin_installed()) : ?>
						<?php echo nigiri_elated_get_button_html(
							array(
								'type'              => 'outline',
								'animation'         => 'yes',
								'html_type'         => 'button',
								'text'              => esc_html__('BOOK A TABLE', 'nigiri'),
								'input_name'        => 'eltdf-rf-submit',
								'icon_pack'         => ''
							)
						) ?>

					<?php else: ?>
						<input type="submit" class="eltdf-btn eltdf-btn-solid" name="eltdf-rf-time">
					<?php endif; ?>
				</div>
			</div>

			<input type="hidden" name="RestaurantID" class="RestaurantID" value="<?php echo esc_attr($open_table_id); ?>">
			<input type="hidden" name="rid" class="rid" value="<?php echo esc_attr($open_table_id); ?>">
			<input type="hidden" name="GeoID" class="GeoID" value="15">
			<input type="hidden" name="txtDateFormat" class="txtDateFormat" value="MM/dd/yyyy">
			<input type="hidden" name="RestaurantReferralID" class="RestaurantReferralID" value="<?php echo esc_attr($open_table_id); ?>">
		</form>
		<p class="eltdf-rf-copyright"><?php esc_html_e('Powered by OpenTable', 'nigiri'); ?></p>
	<?php else: ?>
		<p><?php esc_html_e('You haven\'t added OpenTable ID', 'nigiri'); ?></p>
	<?php endif; ?>
</div>