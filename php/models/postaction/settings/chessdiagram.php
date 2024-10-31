<?php
/******************************************************************************
 *                                                                            *
 *    This file is part of RPB Chessboard, a WordPress plugin.                *
 *    Copyright (C) 2013-2024  Yoann Le Montagner <yo35 -at- melix.net>       *
 *                                                                            *
 *    This program is free software: you can redistribute it and/or modify    *
 *    it under the terms of the GNU General Public License as published by    *
 *    the Free Software Foundation, either version 3 of the License, or       *
 *    (at your option) any later version.                                     *
 *                                                                            *
 *    This program is distributed in the hope that it will be useful,         *
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of          *
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the           *
 *    GNU General Public License for more details.                            *
 *                                                                            *
 *    You should have received a copy of the GNU General Public License       *
 *    along with this program.  If not, see <http://www.gnu.org/licenses/>.   *
 *                                                                            *
 ******************************************************************************/


require_once RPBCHESSBOARD_ABSPATH . 'php/models/postaction/settings/abstract.php';


class RPBChessboardModelPostActionSettingsChessDiagram extends RPBChessboardAbstractModelPostActionSettings {

    public function update() {
        self::updateBoardAspectParameters( 'sdo' );
        self::updateDiagramAlignment();
        return self::getUpdateSuccessMessage();
    }


    public function reset() {
        self::deleteBoardAspectParameters( 'sdo' );
        self::deleteParameter( 'diagramAlignment' );
        return self::getResetSuccessMessage();
    }


    private static function updateDiagramAlignment() {
        if ( isset( $_POST['diagramAlignment'] ) ) {
            $value = RPBChessboardHelperValidation::validateDiagramAlignment( $_POST['diagramAlignment'] );
            if ( isset( $value ) ) {
                update_option( 'rpbchessboard_diagramAlignment', $value );
            }
        }
    }

}
