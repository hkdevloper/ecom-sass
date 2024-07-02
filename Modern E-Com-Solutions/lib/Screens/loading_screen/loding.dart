import 'package:flutter/material.dart';

class LoadingScreen extends StatefulWidget{
    const LoadingScreen({super.key});

    @override
    State<LoadingScreen> createState() => _LoadingScreenState();
}

class _LoadingScreenState extends State<LoadingScreen> {
  void _loadUserInfo() async {
  }

  @override
  void initState() {
    _loadUserInfo();
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Container(
      height: MediaQuery
          .of(context)
          .size
          .height,
      color: Colors.white,
      child: Center(
        // child: Image.network('https://media.giphy.com/media/LP01OPcV97bomkxOAk/giphy.gif'),
        child: CircularProgressIndicator(),
      ),
    );
  }
}