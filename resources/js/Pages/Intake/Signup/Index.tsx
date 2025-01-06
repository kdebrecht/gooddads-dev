import type {IntakePageProps} from "@/Pages/Intake/Index";
import type {IntakeSignupForm} from "@/types/app/intake-signup";


interface SignupIndexPageProps extends IntakePageProps {
    form: IntakeSignupForm;
}

export default function SignupIndexPage({ participant, participantCode, form }: SignupIndexPageProps) {

    
    window.console.log(participant);
    
    return <div >Signup index (create) page</div>
}
