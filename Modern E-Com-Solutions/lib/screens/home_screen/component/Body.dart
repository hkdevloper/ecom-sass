import 'package:flutter/material.dart';

class Body extends StatefulWidget {
  const Body({super.key});

  @override
  State<Body> createState() => _BodyState();
}

class _BodyState extends State<Body> {
  final GlobalKey<ScaffoldState> scaffoldKey = GlobalKey<ScaffoldState>();

  @override
  Widget build(BuildContext context) {
    // return SafeArea(
    //     child:Scaffold(
    //       key: scaffoldKey,
    //       drawer: BuildDrawer(),
    //       appBar: appBar(),
    //       body: const CustomScrollView(
    //         physics: BouncingScrollPhysics(),
    //         slivers: [
    //           SliverToBoxAdapter(
    //             child: SizedBox(height: 15),
    //           ),
    //           SearchBar(),
    //           SliverToBoxAdapter(
    //             child: SizedBox(height: 20),
    //           ),
    //           FeedNews(),
    //           SliverToBoxAdapter(
    //             child: SizedBox(height: 15),
    //           ),
    //           CategoryTitle(title: 'Category', trailingTitle: 'View All'),
    //           HomeCategoryList(),
    //           CategoryTitle(title: 'Popular', trailingTitle: 'View All'),
    //           HomePopularList(),
    //         ],
    //       ),
    //     ),
    // );
      return const Placeholder();
  }
}

