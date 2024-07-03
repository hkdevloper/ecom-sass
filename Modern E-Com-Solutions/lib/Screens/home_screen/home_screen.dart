import 'package:flutter/material.dart';

import '../../app/app_consts.dart';
import 'component/home_button_menu_icon.dart';

class HomeScreen extends StatefulWidget {
  const HomeScreen({super.key});

  @override
  State<HomeScreen> createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
    int bottomNavBarSelectedIndex = 0;
    //final _pageOptions = [Body(), CategoryScreen(), NotificationScreen()];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      //body: _pageOptions[bottomNavBarSelectedIndex],
      bottomNavigationBar: bottomMenu(),
    );
  }

  BottomNavigationBar bottomMenu(){
    return BottomNavigationBar(
      type: BottomNavigationBarType.fixed,
      elevation: 8,
      currentIndex: bottomNavBarSelectedIndex,
      backgroundColor: Colors.white,
      selectedItemColor: AppColors.darkGrey,
      onTap: (index) {
        setState(() {
          bottomNavBarSelectedIndex = index;
        });
      },
      items: [
        homeBottomMenuIcon(
          currentIndex: bottomNavBarSelectedIndex,
          itemIndex: 0,
          svgPic: 'assets/svg/home.svg',
          title: '',
        ),
        homeBottomMenuIcon(
          itemIndex: bottomNavBarSelectedIndex,
          currentIndex: 1,
          svgPic: 'assets/svg/category.svg',
          title: '',
        ),
        homeBottomMenuIcon(
          currentIndex: bottomNavBarSelectedIndex,
          itemIndex: 2,
          svgPic: 'assets/svg/notification.svg',
          title: '',
        ),
        // homeBottomMenuIcon(
        //   currentIndex: bottomNavBarSelectedIndex,
        //   itemIndex: 3,
        //   svgPic: 'assets/svg/profile.svg',
        //   title: '',
        // ),
      ],
    );
  }
}

