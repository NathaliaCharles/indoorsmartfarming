CREATE TABLE Sensor (
    id INT(25) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    --moisture value
    value1 VARCHAR(25),
    --temperature value
    value2 VARCHAR(25),
    --humidity value
    value3 VARCHAR(25),
    reading_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)