import 'package:flutter/material.dart';
import 'screens/home_screen/home_screen.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Saas Application',
      theme: ThemeData(
        textTheme: TextTheme(
          displayLarge: TextStyle(fontFamily: 'Poppins', fontWeight: FontWeight.bold, fontSize: 32.0),
          headlineSmall: TextStyle(fontFamily: 'Poppins', fontWeight: FontWeight.bold, fontSize: 18.0),
          bodyMedium: TextStyle(fontFamily: 'Poppins', fontSize: 14.0),
        ),
        primarySwatch: Colors.blue,
        scaffoldBackgroundColor: Colors.white,
      ),
      home: const HomeScreen(),
    );
  }
}
