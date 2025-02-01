<?php

namespace App\Enum;

enum UserPermissionEnum: string
{
    case ViewRealEstate = 'view_real_estate';
    case CreateRealEstate = 'create_real_estate';
    case EditRealEstate = 'edit_real_estate';
    case DeleteRealEstate = 'delete_real_estate';

    case ViewFiles = 'view_files';
    case UploadFiles = 'upload_files';
    case DeleteFiles = 'delete_files';

    case ManageUsers = 'manage_users';
    case ViewUsers = 'view_users';
    case CreateUser = 'create_user';
    case EditUser = 'edit_user';
    case DeleteUser = 'delete_user';

    case ViewTransactions = 'view_transactions';
    case CreateTransaction = 'create_transaction';
    case EditTransaction = 'edit_transaction';
    case DeleteTransaction = 'delete_transaction';

    case ViewReports = 'view_reports';
    case GenerateReports = 'generate_reports';

    case ManageProperties = 'manage_properties';
    case AddProperty = 'add_property';
    case EditProperty = 'edit_property';
    case DeleteProperty = 'delete_property';

    case AccessDashboard = 'access_dashboard';

    case ManageAppointments = 'manage_appointments';
    case CreateAppointment = 'create_appointment';
    case EditAppointment = 'edit_appointment';
    case DeleteAppointment = 'delete_appointment';

    case ViewClients = 'view_clients';
    case ManageClients = 'manage_clients';

    case ViewOffers = 'view_offers';
    case CreateOffer = 'create_offer';
    case EditOffer = 'edit_offer';
    case DeleteOffer = 'delete_offer';

    case ViewMessages = 'view_messages';
    case SendMessage = 'send_message';
    case DeleteMessage = 'delete_message';
}
