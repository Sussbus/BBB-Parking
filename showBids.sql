-- joins

SELECT bids.bidder_id, bids.bidder_email, bids.bidder_price
FROM users, bids WHERE users.email=bids.bidder_email
ORDER BY bids.bidder_id;

-- end joins

-- inserts

INSERT INTO bids (`bidder_id`, `bidder_email`, `bidder_price`)
VALUES ((SELECT id FROM users WHERE id=1),
(SELECT email FROM users WHERE id=1),
(SELECT price FROM users WHERE id=1));

-- end inserts

-- create table

CREATE TABLE bids (
  id int(11) NOT NULL AUTO_INCREMENT,
  bidder_id int(11) NOT NULL,
  bidder_email varchar(100) NOT NULL UNIQUE,
  bidder_price decimal(7,2) NOT NULL,
  INDEX par_ind (bidder_id),
  PRIMARY KEY  (`id`),
  CONSTRAINT fk_users FOREIGN KEY (bidder_id)
  REFERENCES users(id)
  ON DELETE CASCADE
  ON UPDATE CASCADE
);

-- end create table
