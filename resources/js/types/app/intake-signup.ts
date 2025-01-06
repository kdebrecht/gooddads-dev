

export type IntakeMartialStatus = 'Married'|'Engaged'|'Single'|'Divorced'|'Widowed'
export type IntakeEthnicity = 'American Indian or Alaska Native'|'Asian'|'Black or African American'|'Hispanic or Latino'|'Native Hawaiian or Islander'|'White'

export type IntakeSignupChildrenInfo = {
    name: string;
    dob: string|Date;
    age: number;
    contact: boolean;
    visitation: boolean;
    phoneContact: boolean;
    custody: boolean;
}

export interface IntakeSignupForm {
    id?:string;
    participantId?:string;

    clientName: string;
    date: string|Date;
    address: string;
    employer?: string;
    tShirtSize?: string;
    homeCellPhone: string;
    workPhone?: string;
    otherNumber?: string;
    emailAddress?: string;
    probationParoleCaseWorkerName?: string;
    probationParoleCaseWorkerPhone?: string;

    childrenInfo?: IntakeSignupChildrenInfo[];
    contactWithChildren?: boolean;
    custody?: boolean;
    visitation?: boolean;
    phoneContact?: boolean;

    participantPhoto?: string;
    monthlyChildSupportPayment?: number;
    maritalStatus?: IntakeMartialStatus;
    ethnicity?: IntakeEthnicity;
}

