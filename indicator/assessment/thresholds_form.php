<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This file defines a class for the assessment indicator thresholds form
 *
 * @package    analyticsindicator_assessment
 * @author     Ashley Holman <ashley@netspot.com.au>
 * @copyright  2012 NetSpot Pty Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once(dirname(__FILE__).'/../indicator.class.php');
require_once(dirname(__FILE__).'/indicator.class.php');

class analyticsindicator_assessment_thresholds_form {

    /**
     * Define the elements to be displayed in the form
     *
     * @param $mform
     * @access public
     * @return void
     */
    public function definition_inner(&$mform) {

        $defaults = indicator_assessment::get_defaults();

        $elements = array('newposts', 'readposts', 'replies', 'totalposts');
        $grouparray = array();
        $mform->addElement('text', 'assessment_overduegracedays',
            get_string('overduegracedays', 'analyticsindicator_assessment'), array('size' => 4));
        $mform->setDefault('assessment_overduegracedays', $defaults['overduegracedays']);
        $mform->addElement('text', 'assessment_overduemaximumdays',
            get_string('overduemaximumdays', 'analyticsindicator_assessment'), array('size' => 4));
        $mform->setDefault('assessment_overduemaximumdays', $defaults['overduemaximumdays']);

        // Display overduesubmittedweighting group.
        $grouparray = array();
        $grouparray[] =& $mform->createElement('text', 'assessment_overduesubmittedweighting', '', array('size' => 4));
        $grouparray[] =& $mform->createElement('static', '', '', '%');
        $mform->addGroup($grouparray, 'group_assessment_overduesubmitted',
            get_string('overduesubmittedweighting', 'analyticsindicator_assessment'), '&nbsp;', false);
        $mform->setDefault('assessment_overduesubmittedweighting', $defaults['overduesubmittedweighting']*100);

        // Display overduenotsubmittedweighting group.
        $grouparray = array();
        $grouparray[] =& $mform->createElement('text', 'assessment_overduenotsubmittedweighting', '', array('size' => 4));
        $grouparray[] =& $mform->createElement('static', '', '', '%');
        $mform->addGroup($grouparray, 'group_assessment_overduenotsubmitted',
            get_string('overduenotsubmittedweighting', 'analyticsindicator_assessment'), '&nbsp;', false);
        $mform->setDefault('assessment_overduenotsubmittedweighting', $defaults['overduenotsubmittedweighting']*100);
    }
}