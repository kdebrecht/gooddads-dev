
export type Participant = {
    id: number
    user_id: number
    region_id: number
    street: string
    city: string
    state: string
    zip_code: string
    employer: string
    cell_phone_number: string
    home_phone_number: string
    work_phone_number: string
    at_contact_number: string
    marital_status: 'single'|'married'|'divorced'|'widowed'
    ethnicity: 'white'|'africanAmerican'|'nativeAmerican'|'asian'|'pacificIslander'
    monthly_child_support: number
    intake_date: string
    created_at: string
    updated_at: string
    deleted_at: string | null
}