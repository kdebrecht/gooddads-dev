import type {IntakePageProps} from "@/Pages/Intake/Index";
import type {IntakeSignupForm} from "@/types/app/intake-signup";


interface SignupIndexPageProps extends IntakePageProps {
    form: IntakeSignupForm,
}

export default function SignupEditPage({ participant, participantCode, form: defaultFormValues }: SignupIndexPageProps) {


    return <div >Signup index (Edit) page</div>
}
