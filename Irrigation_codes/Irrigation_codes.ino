int Temperaturevalue = 0;

void setup()
{
  pinMode (A1, INPUT);
  Serial.begin (9600);

  pinMode (10, OUTPUT);
  pinMode (5, OUTPUT);
}

void loop()
//if soil moisture is low, then the do motor will turn on
{
    Temperaturevalue = -40 + 0.488155 * (analogRead (A1) - 20);
    Serial.printIn (Temperaturevalue);
    if (Temperaturevalue < 30) {
        digitalWrite (10 , HIGH);
        digitalWrite (5, HIGH);
    }

    if (Temperaturevalue < 45) {
        digitalWrite (10 , LOW);
        digitalWrite (5, HIGH);
    }
    delay(10); //delay a little bit to improve simulation performance

}

