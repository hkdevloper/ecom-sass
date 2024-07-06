import 'package:flutter/material.dart';

import '../../../app/app_consts.dart';
import '../../profile_screen/profile_screen.dart';

class BuildDeawer extends StatefulWidget {
  const BuildDeawer({super.key});

  @override
  State<BuildDeawer> createState() => _BuildDeawerState();
}

class _BuildDeawerState extends State<BuildDeawer> {
  @override
  Widget build(BuildContext context) {
    return SizedBox(
      child: Drawer(
        child: ListView(
          padding: EdgeInsets.zero,
          children: [
            const UserAccountsDrawerHeader(
              //membuat gambar profil
              currentAccountPicture: CircleAvatar(
                backgroundImage: AssetImage('assets/pictures/unnamed.jpg'),
              ),
              //membuat nama akun
              accountName: Text("Fawwaz Hudzalfah Saputra"),
              //membuat nama email
              accountEmail: Text("manusiacoding29@gmail.com"),
              //memberikan background
              decoration: BoxDecoration(color: AppColors.grey),
            ),
            ListTile(
              leading: const Icon(Icons.person),
              title: const Text("Profile"),
              onTap: () => Navigator.of(context).pushAndRemoveUntil(
                  MaterialPageRoute(builder: (context) => const ProfileScreen()),
                      (route) => false),
            ),
            ListTile(
              leading: const Icon(Icons.inventory),
              title: const Text("My Products"),
              onTap: () => Navigator.of(context).pushAndRemoveUntil(
                  MaterialPageRoute(builder: (context) => const ProfileScreen()),
                      (route) => false),
            ),
            ListTile(
              leading: const Icon(Icons.list_alt),
              title: const Text("My Orders"),
              onTap: () {},
            ),
            ListTile(
              leading: const Icon(Icons.checklist),
              title: const Text("My Wishlist"),
              onTap: () {},
            ),
            const Divider(),
            ListTile(
              leading: const Icon(Icons.info),
              title: const Text("About"),
              onTap: () {},
            ),
            // ListTile(
            //   leading: Icon(Icons.logout_outlined),
            //   title: Text("Logout"),
            //   onTap: () {
            //     logout().then((value) => {
            //       Navigator.of(context).pushAndRemoveUntil(
            //           MaterialPageRoute(
            //               builder: (context) => SignInScreen()),
            //               (route) => false)
            //     });
            //   },
            // ),
          ],
        ),
      ),
    );
  }
}
