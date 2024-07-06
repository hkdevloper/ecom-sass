import 'package:flutter/material.dart';

class FeedNews extends StatefulWidget {
  const FeedNews({super.key});

  @override
  State<FeedNews> createState() => _FeedNewsState();
}

class _FeedNewsState extends State<FeedNews> {
  @override
  Widget build(BuildContext context) {
    return Center(
      child: Scaffold(
        body: Text("feed News!"),
      ),
    );
  }
}
