# openingtimewidget
Widget to display whether a business is open or closed depending on data in a database

This program pulls information from the SQLite database opeingtime.db.
This holds the random opening times for Monday to Sunday.

The conneciton.php file established a link between the php files and the database. This is then shared inside of the functions.php file. Which pulls the data using the sql queries.
This data is then assessed using if statements to see whether the store is currently open or closed and will display that to the screen.

You can change the database to one of your own by adding a new one in the inc folder, using the schema of day text, opening time, closing time. It is important to keep the same schema in the database otherwise the sql queries that have been written will not work.
You can then update the connection.php file to pull the information from the database.

You can change the context of the opening on the widget.php page. You can change the wording from store to phonelines or whichever best suits your needs.
