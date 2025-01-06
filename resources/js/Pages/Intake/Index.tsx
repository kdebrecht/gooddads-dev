
import {Participant} from "@/types/app/participants";
import {useForm, usePage} from "@inertiajs/react";


export interface IntakePageProps {
    participant: Participant,
    participantCode: string,
}


interface IntakeIndexPageProps  {

}

export default function IntakeIndexPage({  }: IntakeIndexPageProps) {

    const error = usePage().props;
    const form = useForm({code: ''});

    // Enter the participant code
    return <form
        className={'flex flex-col w-fit gap-4 ml-3 mt-3'}
        onSubmit={(e) => {
        e.preventDefault();
        form.post(route('intake.start', {participantCode: form.data.code}));

    }}>
        Code
        <input type='text' value={form.data.code} onChange={(e)=> form.setData('code', e.target.value)}/>
        {form.errors.code && <span>{form.errors.code}</span>}
        <input type={'submit'} value={'Begin'} />
    </form>
}