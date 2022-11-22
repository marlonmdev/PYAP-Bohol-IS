<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'pagecontroller';
$route['view/activities/all'] = 'pagecontroller/activities';
$route['view/activities/all/(:any)'] = 'pagecontroller/activities';
$route['view/activities/municipality/(:any)'] = 'pagecontroller/activities_by_municipality';
$route['view/activities/municipality/(:any)/(:any)'] = 'pagecontroller/activities_by_municipality';
$route['view/activity/(:any)'] = 'pagecontroller/view_activity_by_id';
$route['view/announcements'] = 'pagecontroller/announcements';
$route['view/announcements/(:any)'] = 'pagecontroller/announcements';
$route['view/announcement/(:any)'] = 'pagecontroller/view_announcement_by_id';
$route['login'] = 'pagecontroller/login';
$route['send_message'] = 'inquirycontroller/send_inquiry';
$route['forgot_password'] = 'pagecontroller/forgot_password';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Authentication Page Routes
$route['login/parse'] = 'authcontroller/user_login';
$route['admin/logout'] = 'authcontroller/admin_logout';
$route['lgu/logout'] = 'authcontroller/staff_logout';

// Adding Member Data Routes
$route['lgu/members/add/identifying_data/save'] = 'datacontroller/save_identifying_data';
$route['lgu/members/add/siblings/(:any)'] = 'datacontroller/add_siblings';
$route['lgu/members/add/siblings/save/(:any)'] = 'datacontroller/save_siblings';
$route['lgu/members/add/educational_background/(:any)'] = 'datacontroller/add_educational_background';
$route['lgu/members/add/educational_background/save/(:any)'] = 'datacontroller/save_educational_background';
$route['lgu/members/add/special_skills/(:any)'] = 'datacontroller/add_special_skills';
$route['lgu/members/add/special_skills/save/(:any)'] = 'datacontroller/save_special_skills';
$route['lgu/members/add/interest_hobbies/(:any)'] = 'datacontroller/add_interest_hobbies';
$route['lgu/members/add/interest_hobbies/save/(:any)'] = 'datacontroller/save_interest_hobbies';
$route['lgu/members/add/work_labor_experience/(:any)'] = 'datacontroller/add_work_labor_experience';
$route['lgu/members/add/work_labor_experience/save/(:any)'] = 'datacontroller/save_work_labor_experience';
$route['lgu/members/add/membership_on_organizations/(:any)'] = 'datacontroller/add_membership_on_organizations';
$route['lgu/members/add/membership_on_organizations/save/(:any)'] = 'datacontroller/save_membership_on_organizations';

// Admin Pages Routes
$route['admin'] = 'admincontroller';
$route['admin/index'] = 'admincontroller/home';
$route['admin/help'] = 'admincontroller/help';
$route['admin/members'] = 'admincontroller/members';
$route['admin/members/(:any)'] = 'admincontroller/members';
$route['admin/members/view/barangays/(:any)'] = 'admincontroller/view_municipal_barangays';
$route['admin/announcements'] = 'admincontroller/announcements';
$route['admin/announcements/(:any)'] = 'admincontroller/announcements';
$route['admin/accounts'] = 'admincontroller/accounts';
$route['admin/accounts/(:any)'] = 'admincontroller/accounts';
$route['admin/login_history'] = 'admincontroller/login_history';
$route['admin/login_history/(:any)'] = 'admincontroller/login_history';
$route['admin/login_history/clear/all'] = 'admincontroller/clear_login_history';
$route['admin/tabular_reports'] = 'admincontroller/treports';
$route['admin/tabular_reports/summary'] = 'reportcontroller/admin_summary_report';
$route['admin/tabular_reports/breakdown/(:any)/(:any)'] = 'reportcontroller/municipal_breakdown';
$route['admin/tabular_reports/breakdown/(:any)/(:any)/(:any)/(:any)'] = 'reportcontroller/municipal_breakdown_quarter_annual';
$route['admin/tabular_reports/members/(:any)/(:any)'] = 'reportcontroller/barangay_breakdown';
$route['admin/tabular_reports/members/(:any)/(:any)/(:any)/(:any)'] = 'reportcontroller/barangay_breakdown_quarter_annual';
$route['admin/tabular_reports/skills_report'] = 'reportcontroller/admin_skills_report';
$route['admin/tabular_reports/reason_for_dropping_report'] = 'reportcontroller/reason_for_dropping_report';
$route['admin/tabular_reports/interest_hobbies_report'] = 'reportcontroller/interest_hobbies_report';
$route['admin/graphical_reports'] = 'admincontroller/greports';
$route['admin/graphical_reports/highest_educational_attainment_report'] = 'reportcontroller/graphical_highest_educational_attainment_report';
$route['admin/graphical_reports/skills_report'] = 'reportcontroller/graphical_skills_report';
$route['admin/graphical_reports/reason_for_dropping_report'] = 'reportcontroller/graphical_reason_for_dropping_report';
$route['admin/graphical_reports/age_brackets_report'] = 'reportcontroller/graphical_age_brackets_report';
$route['admin/graphical_reports/interest_hobbies_report'] = 'reportcontroller/graphical_interest_hobbies_report';
$route['admin/settings'] = 'admincontroller/settings';

// Admin Report Filter Routes
$route['admin/tabular_reports/filter'] = 'reportfiltercontroller/filter_treports1';
$route['admin/tabular_reports/skills_report/filter'] = 'reportfiltercontroller/filter_treports2';
$route['admin/tabular_reports/reason_for_dropping_report/filter'] = 'reportfiltercontroller/filter_treports3';
$route['admin/tabular_reports/interest_hobbies_report/filter'] = 'reportfiltercontroller/filter_treports4';
$route['admin/graphical_reports/age_brackets_report/filter'] = 'reportfiltercontroller/filter_greports1';
$route['admin/graphical_reports/highest_educational_attainment_report/filter'] = 'reportfiltercontroller/filter_greports2';
$route['admin/graphical_reports/skills_report/filter'] = 'reportfiltercontroller/filter_greports3';
$route['admin/graphical_reports/filter'] = 'reportfiltercontroller/filter_greports4';
$route['admin/graphical_reports/reason_for_dropping_report/filter'] = 'reportfiltercontroller/filter_greports5';
$route['admin/graphical_reports/interest_hobbies_report/filter'] = 'reportfiltercontroller/filter_greports6';

// Staff Report Filter Routes
$route['lgu/tabular_reports/filter'] = 'sreportfiltercontroller/filter_treports1';
$route['lgu/graphical_reports/filter'] = 'sreportfiltercontroller/filter_greports1';
$route['lgu/graphical_reports/age_brackets_report/filter'] = 'sreportfiltercontroller/filter_greports2';
$route['lgu/tabular_reports/(:any)/members'] = 'staffreportcontroller/view_brgy_members';
$route['lgu/tabular_reports/(:any)/members/(:any)/(:any)'] = 'staffreportcontroller/view_brgy_members_quarter_annual';
$route['lgu/tabular_reports/skills'] = 'skillsreportcontroller/lgu_tabular_skills_report';
$route['lgu/tabular_reports/skills/filter'] = 'skillsfilteredcontroller/filter_lgu_tabular_skills_report';
$route['lgu/tabular_reports/reason_for_dropping'] = 'reasonreportcontroller/lgu_tabular_reason_for_dropping_report';
$route['lgu/tabular_reports/reason_for_dropping/filter'] = 'reasonfilteredcontroller/filter_lgu_tabular_reason_for_dropping_report';
$route['lgu/tabular_reports/interest_hobbies'] = 'interestreportcontroller/lgu_tabular_interest_hobbies_report';
$route['lgu/tabular_reports/interest_hobbies/filter'] = 'interestfilteredcontroller/filter_lgu_tabular_interest_hobbies_report';
$route['lgu/graphical_reports/highest_educational_attainment_report'] = 'staffreportcontroller/graphical_highest_educational_attainment_report';
$route['lgu/graphical_reports/highest_educational_attainment_report/filter'] = 'staffreportcontroller/filter_graphical_highest_educational_attainment_report';
$route['lgu/graphical_reports/skills_report'] = 'skillsreportcontroller/lgu_graphical_skills_report';
$route['lgu/graphical_reports/skills_report/filter'] = 'skillsfilteredcontroller/filter_lgu_graphical_skills_report';
$route['lgu/graphical_reports/reason_for_dropping_report'] = 'reasonreportcontroller/lgu_graphical_reason_for_dropping_report';
$route['lgu/graphical_reports/reason_for_dropping_report/filter'] = 'reasonfilteredcontroller/filter_lgu_graphical_reason_for_dropping_report';
$route['lgu/graphical_reports/interest_hobbies_report'] = 'interestreportcontroller/lgu_graphical_interest_hobbies_report';
$route['lgu/graphical_reports/interest_hobbies_report/filter'] = 'interestfilteredcontroller/filter_lgu_graphical_interest_hobbies_report';

//Members Search Routes
$route['admin/members/search/data'] = 'searchcontroller/admin_load_records';
$route['admin/members/search/data/(:any)'] = 'searchcontroller/admin_load_records';
$route['lgu/members/search/data'] = 'searchcontroller/lgu_load_records';
$route['lgu/members/search/data/(:any)'] = 'searchcontroller/lgu_load_records';

// Staff Pages Routes
$route['lgu'] = 'staffcontroller';
$route['lgu/index'] = 'staffcontroller/home';
$route['lgu/help'] = 'staffcontroller/help';
$route['lgu/members'] = 'staffcontroller/members';
$route['lgu/members/(:any)'] = 'staffcontroller/members';
$route['lgu/announcements'] = 'staffcontroller/announcements';
$route['lgu/activities'] = 'staffcontroller/activities';
$route['lgu/activities/(:any)'] = 'staffcontroller/activities';
$route['lgu/barangays'] = 'staffcontroller/barangays';
$route['lgu/barangays/(:any)'] = 'staffcontroller/barangays';
$route['lgu/tabular_reports'] = 'staffcontroller/treports';
$route['lgu/tabular_reports/summary'] = 'staffreportcontroller/staff_summary_report';
$route['lgu/graphical_reports'] = 'staffcontroller/greports';
$route['lgu/graphical_reports/age_brackets_report'] = 'staffreportcontroller/graphical_age_brackets_report';
$route['lgu/settings'] = 'staffcontroller/settings';

// Admin Profile Routes
$route['admin/account_settings/profile/(:any)'] = 'accountcontroller/change_profile_pic';
$route['admin/account_settings/info/(:any)'] = 'accountcontroller/change_account_info';
$route['admin/account_settings/password/(:any)'] = 'accountcontroller/change_password';

// Admin Settings
$route['admin/settings/signatory1/(:any)'] = 'admincontroller/add_update_signatory1';
$route['admin/settings/signatory2/(:any)'] = 'admincontroller/add_update_signatory2';
$route['admin/settings/site_contacts/(:any)'] = 'admincontroller/add_update_site_contacts';

// Start of Staff Member Routes
$route['lgu/members/add/identifying_data'] = 'membercontroller';
// End of Member Routes

// start of edit member data routes
$route['lgu/members/view/details/(:any)'] = 'membercontroller/staff_view_member_details';
$route['lgu/members/edit/identifying_data/(:any)'] = 'editdatacontroller/edit_identifying_data';
$route['lgu/members/edit/identifying_data/update/(:any)'] = 'editdatacontroller/update_identifying_data';
$route['lgu/members/edit/educational_background/(:any)'] = 'editdatacontroller/edit_educational_background';
$route['lgu/members/edit/educational_background/update/(:any)'] = 'editdatacontroller/update_educational_background';
$route['lgu/members/add/educational_background/update/(:any)'] = 'editdatacontroller/save_educational_background';
// start of siblings management routes
$route['lgu/members/view/siblings/(:any)'] = 'editdatacontroller/view_siblings';
$route['lgu/members/edit/sibling/(:any)'] = 'editdatacontroller/edit_sibling';
$route['lgu/members/edit/siblings/update/(:any)'] = 'editdatacontroller/update_sibling';
$route['lgu/members/view/siblings/add/(:any)'] = 'editdatacontroller/add_more_siblings';
$route['lgu/members/view/siblings/add/save/(:any)'] = 'editdatacontroller/save_more_siblings';
// special skills
$route['lgu/members/edit/special_skills/(:any)'] = 'editdatacontroller/edit_special_skills';
$route['lgu/members/add/special_skills/update/(:any)'] = 'editdatacontroller/add_special_skills';
$route['lgu/members/edit/special_skills/update/(:any)'] = 'editdatacontroller/update_special_skills';
// interest hobbies
$route['lgu/members/edit/interest_hobbies/(:any)'] = 'editdatacontroller/edit_interest_hobbies';
$route['lgu/members/add/interest_hobbies/update/(:any)'] = 'editdatacontroller/add_interest_hobbies';
$route['lgu/members/edit/interest_hobbies/update/(:any)'] = 'editdatacontroller/update_interest_hobbies';
// work experience
$route['lgu/members/view/work_experience/(:any)'] = 'editdatacontroller/view_work_experience';
$route['lgu/members/view/work_experience/add/(:any)'] = 'editdatacontroller/add_more_work_experience';
$route['lgu/members/view/work_experience/add/save/(:any)'] = 'editdatacontroller/save_more_work_experience';
$route['lgu/members/edit/work_experience/(:any)'] = 'editdatacontroller/edit_work_experience';
$route['lgu/members/edit/work_experience/update/(:any)'] = 'editdatacontroller/update_work_experience';
$route['lgu/members/delete/work_experience/(:any)'] = 'editdatacontroller/delete_work_experience';
// membership on organization
$route['lgu/members/view/member_organization/(:any)'] = 'editdatacontroller/view_member_organization';
$route['lgu/members/view/member_organization/add/(:any)'] = 'editdatacontroller/add_more_organization';
$route['lgu/members/view/member_organization/add/save/(:any)'] = 'editdatacontroller/save_more_organization';
$route['lgu/members/edit/member_organization/(:any)'] = 'editdatacontroller/edit_member_organization';
$route['lgu/members/edit/member_organization/update/(:any)'] = 'editdatacontroller/update_member_organization';
$route['lgu/members/delete/member_organization/(:any)'] = 'editdatacontroller/delete_member_organization';

// start of member data delete routes
$route['lgu/members/delete/sibling/(:any)'] = 'editdatacontroller/delete_sibling';
$route['lgu/members/delete/member/(:any)'] = 'membercontroller/delete_member';

// Start of Activity Routes
$route['lgu/activities/add/new'] = 'activitycontroller/add_activity';
$route['lgu/activities/add/activity/save'] = 'activitycontroller/save_activity';
$route['lgu/activities/delete/activity/(:any)'] = 'activitycontroller/delete_activity';
$route['lgu/activities/edit/activity/(:any)'] = 'activitycontroller/edit_activity';
$route['lgu/activities/update/activity/(:any)'] = 'activitycontroller/update_activity';
// End of Activity Routes


// Admin member management routes
$route['admin/members/view/details/(:any)'] = 'membercontroller/admin_view_member_details';
$route['admin/members/search/view/details/(:any)'] = 'membercontroller/admin_view_search_member_details';
$route['admin/members/delete/member/(:any)'] = 'membercontroller/admin_delete_member';
$route['admin/members/edit/identifying_data/(:any)'] = 'membercontroller/edit_identifying_data';
$route['admin/members/edit/identifying_data/update/(:any)'] = 'membercontroller/update_identifying_data';
$route['admin/members/edit/education/(:any)'] = 'membercontroller/edit_educational_background';
$route['admin/members/add/special_skills/update/(:any)'] = 'membercontroller/add_special_skills';
$route['admin/members/edit/educational_background/update/(:any)'] = 'membercontroller/update_educational_background1';
$route['admin/members/update/educational_background/update/(:any)'] = 'membercontroller/update_educational_background2';
// Siblings management routes
$route['admin/members/view/siblings/(:any)'] = 'membercontroller/view_siblings';
$route['admin/members/view/siblings/add/(:any)'] = 'membercontroller/add_more_siblings';
$route['admin/members/view/siblings/add/save/(:any)'] = 'membercontroller/save_more_siblings';
$route['admin/members/edit/sibling/(:any)'] = 'membercontroller/edit_sibling';
$route['admin/members/edit/siblings/update/(:any)'] = 'membercontroller/update_sibling';
$route['admin/members/delete/sibling/(:any)'] = 'membercontroller/delete_sibling';
//End of sibling management route
$route['admin/members/edit/special_skills/(:any)'] = 'membercontroller/edit_special_skills';
$route['admin/members/add/special_skills/update/(:any)'] = 'membercontroller/add_special_skills';
$route['admin/members/edit/special_skills/update/(:any)'] = 'membercontroller/update_special_skills';
$route['admin/members/edit/interest_hobbies/(:any)'] = 'membercontroller/edit_interest_hobbies';
$route['admin/members/add/interest_hobbies/update/(:any)'] = 'membercontroller/add_interest_hobbies';
$route['admin/members/edit/interest_hobbies/update/(:any)'] = 'membercontroller/update_interest_hobbies';
// Work experience management routes
$route['admin/members/view/work_experience/(:any)'] = 'membercontroller/view_work_experience';
$route['admin/members/view/work_experience/add/(:any)'] = 'membercontroller/add_more_work_experience';
$route['admin/members/view/work_experience/add/save/(:any)'] = 'membercontroller/save_more_work_experience';
$route['admin/members/edit/work_experience/(:any)'] = 'membercontroller/edit_work_experience';
$route['admin/members/edit/work_experience/update/(:any)'] = 'membercontroller/update_work_experience';
$route['admin/members/delete/work_experience/(:any)'] = 'membercontroller/delete_work_experience';
// End of work experience management routes
// Member organization management routes
$route['admin/members/view/member_organization/(:any)'] = 'membercontroller/view_member_organization';
$route['admin/members/view/member_organization/add/(:any)'] = 'membercontroller/add_more_organization';
$route['admin/members/view/member_organization/add/save/(:any)'] = 'membercontroller/save_more_organization';
$route['admin/members/edit/member_organization/(:any)'] = 'membercontroller/edit_member_organization';
$route['admin/members/edit/member_organization/update/(:any)'] = 'membercontroller/update_member_organization';
$route['admin/members/delete/member_organization/(:any)'] = 'membercontroller/delete_member_organization';
// End of organization management routes

// start of Account Routes
$route['admin/accounts/add/new'] = 'accountcontroller';
$route['admin/accounts/add/save'] = 'accountcontroller/save_account';
$route['admin/accounts/edit/(:any)'] = 'accountcontroller/edit_account';
$route['admin/accounts/edit/update/(:any)'] = 'accountcontroller/update_account';
$route['admin/accounts/delete/(:any)'] = 'accountcontroller/delete_account';
$route['admin/accounts/change_password/(:any)'] = 'accountcontroller/change_password_page';
$route['admin/accounts/change_password/update/(:any)'] = 'accountcontroller/change_account_password';
$route['admin/accounts/search'] = 'accountcontroller/search_account';
$route['admin/accounts/generate_password'] = 'accountcontroller/generate_password';

$route['lgu/account_settings/profile/(:any)'] = 'accountcontroller/change_profile_pic';
$route['lgu/account_settings/info/(:any)'] = 'accountcontroller/change_account_info';
$route['lgu/account_settings/password/(:any)'] = 'accountcontroller/change_password';
// End of Account Routes

// start of Announcement Routes
$route['admin/announcements/add/new'] = 'announcementcontroller';
$route['admin/announcements/add/post'] = 'announcementcontroller/post_announcement';
$route['admin/announcements/edit/(:any)'] = 'announcementcontroller/edit_announcement';
$route['admin/announcements/edit/update/(:any)'] = 'announcementcontroller/update_announcement';
$route['admin/announcements/delete/(:any)'] = 'announcementcontroller/delete_announcement';
// End of Announcement Routes

