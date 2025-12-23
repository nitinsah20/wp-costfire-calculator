<?php
/*
Plugin Name: Coast FIRE Calculator (Monthly SIP)
Description: Coast FIRE Calculator with Monthly Investment Required
Version: 1.0
Author: nitinsah20
*/
if (!defined('ABSPATH')) exit;

function coastfire_assets() {
    wp_enqueue_style('coastfire-style', plugin_dir_url(__FILE__) . 'assets/style.css');
    wp_enqueue_script('coastfire-script', plugin_dir_url(__FILE__) . 'assets/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'coastfire_assets');

function coastfire_shortcode() {
    ob_start(); ?>
    <div class="coastfire-card">
        <h2>💰 Coast FIRE Calculator</h2>

        <div class="coastfire-grid">
            <div>
                <label>Current Age</label>
                <input type="number" id="cf_age">
            </div>
            <div>
                <label>Retirement Age</label>
                <input type="number" id="cf_retire_age">
            </div>
            <div>
                <label>Current Investment (₹)</label>
                <input type="number" id="cf_investment">
            </div>
            <div>
                <label>Monthly Investment (₹)</label>
                <input type="number" id="cf_monthly">
            </div>
            <div>
                <label>Expected Return (%)</label>
                <input type="number" id="cf_return">
            </div>
            <div>
                <label>Retirement Goal (₹)</label>
                <input type="number" id="cf_goal">
            </div>
        </div>

        <button onclick="calculateCoastFire()">Calculate</button>
        <div id="cf_result"></div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('coastfire_calculator', 'coastfire_shortcode');
