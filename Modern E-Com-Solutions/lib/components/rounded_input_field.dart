import 'package:flutter/material.dart';
import 'package:e_com_solutions/components/text_field_container.dart';
import 'package:e_com_solutions/app/app_consts.dart';

class RoundedInputField extends StatelessWidget {
  final String hintText;
  final IconData icon;
  final ValueChanged<String> onChanged;
  const RoundedInputField(
      {super.key,
      required this.hintText,
      required this.icon,
      required this.onChanged});

  @override
  Widget build(BuildContext context) {
    return TextFieldContainer(
      child: TextField(
        onChanged: onChanged,
        cursorColor: AppColors.darkGrey,
        decoration: InputDecoration(
          icon: Icon(
            icon,
            color: AppColors.darkGrey,
          ),
          hintText: hintText,
          border: InputBorder.none,
        ),
      ),
    );
  }
}
