/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  mark
 * Created: Nov 17, 2017
 */

[WARNING  ] INSERT INTO unlandmark.places( name, one_line, nickname, places_type_id, address_id, landmark_status_id, current_use, current_photo_link_id, historic_address, historic_photo_url_id, start_date, start_date_confidence, end_date, end_date_confidence, history_summary) VALUES ('Chiodo''s Tavern', '', '', (select landmark_type_id from unlandmark.landmark_type where landmark_type_description = 'Business'), (select address_id from unlandmark.address where current_address = '133 W 8th Ave Homestead, PA 15120 United States'), 2, 'Walgreens Homestead replaced it completely ', 3, 'No', 4, 'https://newsinteractive.post-gazette.com/thedigs/2015/04/29/chiodos-tavern-in-homestead-home-to-everybody/', '0', 'https://newsinteractive.post-gazette.com/thedigs/2015/04/29/chiodos-tavern-in-homestead-home-to-everybody/', '0', 'CHECK VALUES')
            ERROR:  value too long for type character varying(20)