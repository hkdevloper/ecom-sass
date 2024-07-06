import 'package:flutter/material.dart';

class HomePopularList extends StatefulWidget {
  const HomePopularList({super.key});

  @override
  State<HomePopularList> createState() => _HomePopularListState();
}

class _HomePopularListState extends State<HomePopularList> {

  @override
  Widget build(BuildContext context) {
    return const Center(
      child: Scaffold(
        body: Text("HomePopularList"),
      ),
    );
  }
}
