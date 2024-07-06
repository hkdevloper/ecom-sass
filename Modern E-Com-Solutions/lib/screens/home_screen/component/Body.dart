import 'package:e_com_solutions/screens/home_screen/component/popular_list.dart';
import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';
import 'package:e_com_solutions/screens/cart_screen/cart_screen.dart';
import 'package:e_com_solutions/screens/message_screen/message_screen.dart';
import 'category_list.dart';
import 'category_title.dart';
import 'drawer.dart';
import 'feed_news.dart';

class Body extends StatefulWidget {
  const Body({super.key});

  @override
  State<Body> createState() => _BodyState();
}

class _BodyState extends State<Body> {
  final GlobalKey<ScaffoldState> scaffoldKey = GlobalKey<ScaffoldState>();

  @override
  Widget build(BuildContext context) {
    return SafeArea(
        child:Scaffold(
          key: scaffoldKey,
          drawer: const BuildDeawer(),
          appBar: appBar(),
          body: const CustomScrollView(
            physics: BouncingScrollPhysics(),
            slivers: [
              SliverToBoxAdapter(
                child: SizedBox(height: 15),
              ),
              //SearchBar(),
              SliverToBoxAdapter(
                child: SizedBox(height: 20),
              ),
              FeedNews(),
              SliverToBoxAdapter(
                child: SizedBox(height: 15),
              ),
               CategoryTitle(title: 'Category', trailingTitle: 'View All'),
               HomeCategoryList(),
               CategoryTitle(title: 'Popular', trailingTitle: 'View All'),
               HomePopularList(),
            ],
          ),
        ),
    );
      return const Placeholder();
  }

  AppBar appBar() {
    return AppBar(
      elevation: 0,
      backgroundColor: Colors.white,
      centerTitle: true,
      leading: IconButton(
        icon: SvgPicture.asset(
          'assets/svg/drawer_menu.svg',
          fit: BoxFit.fill,
        ),
        onPressed: () {
          scaffoldKey.currentState?.openDrawer();
        },
      ),
      // leading: Padding(
      //   padding: const EdgeInsets.all(12.0),
      //   child: SvgPicture.asset('assets/svg/drawer_menu.svg'),
      // ),
      title: const Text(
        'Saldah shop',
        style: TextStyle(
          fontSize: 16,
          color: Colors.black,
          fontWeight: FontWeight.bold,
        ),
      ),
      actions: [
        Stack(
          clipBehavior: Clip.none,
          alignment: Alignment.center,
          children: [
            IconButton(
              onPressed: () => Navigator.of(context).pushAndRemoveUntil(
                  MaterialPageRoute(builder: (context) => MessageScreen()),
                      (route) => false),
              icon: SvgPicture.asset(
                'assets/svg/message.svg',
                height: 17,
                width: 17,
                color: Colors.black,
              ),
            ),
            const Positioned(
              bottom: 32,
              right: -3,
              child: CircleAvatar(
                radius: 4,
                backgroundColor: Colors.red,
              ),
            ),
          ],
        ),
        const SizedBox(width: 8 ),
        Stack(
          clipBehavior: Clip.none,
          alignment: Alignment.center,
          children: [
            IconButton(
              onPressed: () => Navigator.of(context).pushAndRemoveUntil(
                  MaterialPageRoute(builder: (context) => CartScreen()),
                      (route) => false),
              icon: SvgPicture.asset(
                'assets/svg/shop.svg',
                height: 17,
                width: 17,
                color: Colors.black,
              ),
            ),
            const Positioned(
              bottom: 32,
              right: -5,
              child: CircleAvatar(
                radius: 4,
                backgroundColor: Colors.red,
              ),
            ),
          ],
        ),
        const SizedBox(width: 15),
      ],
    );
  }
}

